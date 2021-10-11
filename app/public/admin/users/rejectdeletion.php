<?php

use Project\Services\UserService;

$service = new UserService();

$result = $service->deleteFromWaitings();

if ($result == false)
{
    header('Location: /404/404');
    die();
}

header('Location: /admin/users/deletelist');