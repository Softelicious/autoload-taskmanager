<?php
require_once('vendor/autoload.php');

use App\DB;
use App\QueryBuilder;
$config = require 'config.php';
$pdo = DB::connection($config['database']);

$builder = new QueryBuilder($pdo);

$builder->read();
?>


