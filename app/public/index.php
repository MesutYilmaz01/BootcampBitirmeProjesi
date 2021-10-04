<?php


require '../vendor/autoload.php';
session_start();

$pieces = explode("?", $_SERVER["REQUEST_URI"]);

include '.'.$pieces[0].'.php';
