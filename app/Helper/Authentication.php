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
        if($result) 
        {
            $user = new User();
            $user->setType($result["type"]);
            $user->setName($result["name"]);
            $user->setSurname($result["surname"]);
            $user->setEmail($result["email"]);
            $user->setId($result["id"]);
            $user->setToken($result["token"]);
            $user->setCreatedAt($result["created_at"]);
            $user->setUpdatedAt($result["updated_at"]);


            $_SESSION["user"] = $user;

            return array(1,$user);

        } 
        else 
        {
            return array(0,"Email ile şifre eşleşmiyor...");
        }
    }

    public static function logOut(){
        $token = self::getUser()->getToken();
        $result = self::checkToken($token);
        session_destroy();
        if ($result)
        {
            return true;
        }
        return false;
    }

    public  static function check(){
        if (isset($_SESSION["user"]))
        {
            return $_SESSION["user"];
        } 
        else 
        {
            return false;
        }
    }

    public  static function checkToken($token){
        if ($token)
        {
            $db = new Database();
            $db = $db->getDb();
    
            $sql = "SELECT * FROM users WHERE token=?";
            $stmt= $db->prepare($sql);
            $stmt->execute([$token]);
            $result = $stmt->fetch();
            if($result) 
            {
                return $result;    
            } 
            else 
            {
                return false;
            }

        } 
        else 
        {
            return false;
        }
    }

    public static function getUser()
    {
        return $_SESSION["user"];
    }

}