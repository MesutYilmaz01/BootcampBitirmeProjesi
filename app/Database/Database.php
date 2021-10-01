<?php

namespace Project\Database;

class Database{
    private $db;
    public function __construct()
    {
        try{
            $this->db = new \PDO("mysql:host=host.docker.internal:3306;dbname=testdb", "root", "mypassword");
        }catch(\PDOException $e){
            print $e->getMessage();
        }
    }
    public function getDb(){
        return $this->db;
    }
}