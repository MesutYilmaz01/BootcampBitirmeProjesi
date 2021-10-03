<?php


require '../vendor/autoload.php';

$pieces = explode("?", $_SERVER["REQUEST_URI"]);

include '.'.$pieces[0].'.php';
