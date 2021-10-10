<?php

use Project\Services\UserService;

try{
    $service = new UserService();
    $result = $service->logOutForAPI();
    if ($result == true)
    {
        echo json_encode([
            "result" => true,
            "message" => "Başarı ile çıkış yapıldı."
        ]);
        exit;
    }
    echo json_encode([
        "result" => false,
        "message" => "Çıkış yaparken bir sorun oluştu."
    ]);
    exit;
}catch(Throwable $e){
    echo json_encode([
        "result" => false,
        "message" => "Bir hata oluştu."
    ]);
    exit;
}