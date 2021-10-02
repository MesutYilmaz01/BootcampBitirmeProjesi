<?php
session_start();
require './../../vendor/autoload.php';

use Project\Helper\Authentication;
use Project\Services\LoginService;

$login = new LoginService();
if(Authentication::check()){
    $login->logout();

}
    header('Location: /public/login/login.php');

?>

