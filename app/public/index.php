<?php


require '../vendor/autoload.php';
session_start();

$pieces = explode("?", $_SERVER["REQUEST_URI"]);

$file = '.'.$pieces[0].'.php';
$maintance = __DIR__."/assets/maintance/maintance.txt";
if (file_exists($maintance))
{
    include  __DIR__.'/maintance/outofservice.php';
}
else
{
    if (file_exists($file))
    {
        include '.'.$pieces[0].'.php';
    }
    else
    {
        header('Location: /404/404');
    }
}

