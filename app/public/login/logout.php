<?php

use Project\Helper\Authentication;
use Project\Helper\Logging;
use Project\Services\LoginService;

$login = new LoginService();
if(Authentication::check()){
    $result = $login->logout();
    echo "Siteye yönlendiriliyorsunuz...
    <script type='text/javascript'>
        window.localStorage.removeItem('user-token')
        window.location.href = '/main/index';
    </script>";

}
header('Location: /login/login');

?>

