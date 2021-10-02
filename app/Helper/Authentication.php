<?php

namespace Project\Helper;
use Project\Database\Database;
use Project\Models\User;

class Authentication{

    public static function login($email, $password){
        
        $db = new Database();
        $db = $db->getDb();

        $sql = "SELECT * FROM users WHERE email=? and password=?";
        $stmt= $db->prepare($sql);
        $stmt->execute([$email, $password]);
        $result = $stmt->fetch();
        if($result) {
            $user = new User();
            $user->setType($result["type"]);
            $user->setName($result["name"]);
            $user->setSurname($result["surname"]);
            $user->setEmail($result["email"]);
            $user->setId($result["id"]);


            $_SESSION["user"] = $user;

            return $user;

        } else {
            return false;
        }
    }

    public static function logOut(){
        session_destroy();
    }

    public  static function check(){
        if(isset($_SESSION["user"]))
        {
            return $_SESSION["user"];
        } else {
            return false;
        }
    }

    public static function getUser()
    {
        return $_SESSION["user"];
    }



}