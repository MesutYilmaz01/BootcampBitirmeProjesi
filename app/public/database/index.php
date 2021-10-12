<?php

use Project\Config\AppSetting;

try{
    $host = AppSetting::$config["host"];
    $port = AppSetting::$config["port"];
    $user = AppSetting::$config["user"];
    $pass = AppSetting::$config["pass"];
    $dbname = AppSetting::$config["dbname"];

    $database = new \PDO("mysql:host=$host:$port;", "$user", "$pass");
    
    
    $sql = file_get_contents('./database/teknasyon_db.sql');

    $qr = $database->exec($sql);
    echo "Database aktarımı tammalandı";

}catch(\PDOException $e){
    print $e->getMessage();
}
