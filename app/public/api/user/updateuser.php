<?php

use Project\Services\UserService;

try{

    $service = new UserService();
    $result  = $service->updateWithAPI();
    if ($result)
    {
        echo json_encode([
            "result" => true,
            "message" => "Bilgiler başarı ile güncellendi."
        ]);
        exit;
    }
    echo json_encode([
        "result" => false,
        "message" => "Bilgiler güncellenirken bir hata oluştu."
    ]);
    exit;

}catch(Throwable $e){
    echo json_encode([
        "result" => false,
        "message" => "Bir hata oluştu."
    ]);
    exit;
}