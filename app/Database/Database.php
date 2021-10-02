<?php

namespace Project\Database;
use Project\Config\AppSetting;

class Database{
    private $db;
    public function __construct()
    {
        $host = AppSetting::$config["host"];
        $port = AppSetting::$config["port"];
        $user = AppSetting::$config["user"];
        $pass = AppSetting::$config["pass"];
        $dbname = AppSetting::$config["dbname"];

        try{
            $this->db = new \PDO("mysql:host=$host:$port;dbname=$dbname", "$user", "$pass");
        }catch(\PDOException $e){
            print $e->getMessage();
        }
    }
    public function getDb(){
        return $this->db;
    }
}