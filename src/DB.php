<?php
namespace App;
use PDO;
class DB
{
    public static function connection($config){
        try{
            return new PDO($config['connection'], $config['username'], $config['password']);
        }catch(PDOException $e){
            echo "kazkas negerai";
        }
    }
}