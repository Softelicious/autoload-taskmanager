<?php
namespace App;
use PDO;

class QueryBuilder
{
    public $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function create($task){
        try {
            $sql = "INSERT INTO tasks (task, status) VALUES (?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$task, false]);
        }catch (PDOException $e){
            echo $e;
        }
    }
    public function read(){
        try {
            $sql = "SELECT * FROM tasks";
            $stmt = $this->pdo->query($sql);
            return $stmt;
        }catch (PDOException $e){
            echo $e;
        }
    }
    public function update($status, $id){
        try {
            $sql = "UPDATE tasks SET status=? WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$status, $id]);
        }catch (PDOException $e){
            echo $e;
        }
    }
    public function delete($id){
        try {
            $sql = "DELETE FROM tasks WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
        }catch (PDOException $e){
            echo $e;
        }
    }

}