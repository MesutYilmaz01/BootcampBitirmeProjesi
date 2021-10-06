<?php


require '../vendor/autoload.php';
session_start();

$pieces = explode("?", $_SERVER["REQUEST_URI"]);

$file = '.'.$pieces[0].'.php';
if(file_exists($file))
{
    include '.'.$pieces[0].'.php';
}
else
{
    header('Location: /404/404');
}

