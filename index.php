<?php
require_once('vendor/autoload.php');

use App\DB;
$config = require 'config.php';
$pdo = DB::connection($config['database']);

$task = "Eiti namo";
$status = false;

try {
/*    $sql = "INSERT INTO tasks (task, status) VALUES (?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$task, $status]);*/

var_dump($pdo->query('SELECT * FROM tasks'));

}catch (PDOException $e){
    echo $e;
}
