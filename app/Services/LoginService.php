<?php

namespace Project\Services;

use Project\Helper\Authentication;

class LoginService{

    public function login(){
        
        $email = $_POST["email"];
        $password = $_POST["password"];
        if (!Authentication::check())
        {
            $result = Authentication::login($email, $password);
            return $result;
        }
    }

    public function logout() {
        Authentication::logOut();
    } 

}