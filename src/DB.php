<?php
namespace App;
use PDO;
class DB
{
    public static function connection($config){
        try{
            return new PDO($config['connection'].';dbname='.$config['dbname'].';charset='.$config['charset'], $config['username'], $config['password'], $config['options']);
        }catch(PDOException $e){
            echo "kazkas negerai";
        }
    }
}