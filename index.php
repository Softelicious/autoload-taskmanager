<?php
require_once('vendor/autoload.php');

use App\DB;
use App\QueryBuilder;
$config = require 'config.php';
$pdo = DB::connection($config['database']);

$builder = new QueryBuilder($pdo);
$data = $builder->read();

if(isset($_POST['submit']) && $_POST['task']!=null){
    $builder->create($_POST['task']);
    header("Location: index.php");
}

if(isset($_GET['s_id']) && isset($_GET['status'])){
    $status = ($_GET['status']==0)?1:0;
    $builder->update($status, $_GET['s_id']);

    header("Location: index.php");
}

if(isset($_GET['id'])){
    $builder->delete($_GET['id']);
    header("Location: index.php");
}

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tbody>
        <?php foreach ($data as $row) : ?>
            <td>
                <td class="row s"><?php echo $row['task']; ?></td>
                <td> <a class="row s<?php echo $row['status']; ?>" href="index.php?s_id=<?php echo $row['id'];?>&status=<?php echo $row['status'];?>"></a><td>
                <td> <a class="row delete" href="index.php?id=<?php echo $row['id'];?>"></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <form class="create" action="" method="post">
        <input type="text" name="task" placeholder="Enter task"><br>
        <input type="submit" name="submit" value="enter">
    </form>
</body>
</html>


