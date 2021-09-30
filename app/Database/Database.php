<?php

namespace Project\Database;

use \Project\Repositories\DatabaseRepository as DatabaseRepository;

class Database{
    private $db;
    public function __construct(private DatabaseRepository $dr)
    {
        try{
            $this->db = new \PDO("mysql:host=host.docker.internal:3306;dbname=testdb", "root", "mypassword");
            echo 'databse buda';
        }catch(\PDOException $e){
            print $e->getMessage();
        }
    }
    public function create(){
        echo "databse";
    }
}