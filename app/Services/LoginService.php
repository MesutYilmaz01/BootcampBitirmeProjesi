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
                Logging::alert($email. " kullanıcısı başarısız bir login girişiminde bulundu");
            }
            Logging::info($email. " kullanıcısı başarılı bir şekilde login oldu");
            return $result;
        }
    }

    public function logout() {
        Authentication::logOut();
    } 

}