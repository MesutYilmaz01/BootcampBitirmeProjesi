<?php


require '../vendor/autoload.php';
session_start();

$pieces = explode("?", $_SERVER["REQUEST_URI"]);

$file = '.'.$pieces[0].'.php';
$maintance = __DIR__."/assets/maintance/maintance.txt";
if (file_exists($maintance))
{
    if($pieces[0] == "/maintance/login")
    {
        include  __DIR__.'/maintance/login.php';
    }
    else
    {
        include  __DIR__.'/maintance/outofservice.php';
    }
    
}
else
{
    if (file_exists($file))
    {
        if($pieces[0] == "/maintance/login")
        {
            header('Location: /404/404');
        }
        else
        {
            include '.'.$pieces[0].'.php';
        }
    }
    else
    {
        header('Location: /404/404');
    }
}

