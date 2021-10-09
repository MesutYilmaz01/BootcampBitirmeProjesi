<?php

use Project\Helper\Authentication;
use Project\Services\UserService;

try{
    $service = new UserService();
    if (!isset($_GET["token"]) || !Authentication::checkToken($_GET["token"]))
    {
        http_response_code(401);
        echo json_encode([
            "result" => false,
            "message" => "Oturum açılamadı..."
        ]);
        exit;
    }
    $user = $service->getUserByToken($_GET["token"]);
    if ($user == false)
    {
        echo json_encode([
            "result" => false,
            "message" => "Kullanıcı çekilirken bir hata oluştu"
        ]);
        exit;
    }
    echo json_encode([
        "result"    => true,
        "id"        => $user->getId(),
        "name"      => $user->getName(),
        "surname"     => $user->getSurname(),
        "email"     => $user->getEmail(),
        "token"     => $user->getToken(),
    ]);
    exit;


}catch(Throwable $e){
    echo json_encode([
        "result" => false,
        "message" => "Beklenmedik bir hata oluştu"
    ]);
    exit;
}