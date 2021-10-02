<?php

namespace Project\Services;

use Project\Helper\Authentication;

class LoginService{

    public function login(){

        var_dump(Authentication::check()); exit;
        
        $email = $_POST["email"];
        $password = $_POST["password"];
        if(!Authentication::check())
            $result = Authentication::login($email, $password);
        
        var_dump(Authentication::getUser()); exit;
        return $result;

    }

    public function logout() {
        Authentication::logOut();
    } 

}