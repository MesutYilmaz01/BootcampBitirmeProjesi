<?php

namespace Project\Services;

use Project\Helper\Authentication;
use Project\Helper\Logging;

class LoginService{

    public function login(){
        
        $email = $_POST["email"];
        $password = $_POST["password"];
        if (!Authentication::check())
        {   
            $result = Authentication::login($email, $password);
            if ($result[0] == 0)
            {
                return $result;
            }

            Logging::info(Authentication::getUser(),$email. " kullanıcısı başarılı bir şekilde login oldu");
            return $result;
        }
    }

    public function logout() {
        Logging::info(Authentication::getUser(), Authentication::getUser()->getEmail()," kullanıcısı başarılı bir şekilde çıkış yaptı");
        Authentication::logOut();
    } 

}