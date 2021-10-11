<?php

use Project\Services\UserService;

try{

    $service = new UserService();
    $result  = $service->addUserRelatedCategory();
    if ($result)
    {
        echo json_encode([
            "result" => true,
            "message" => "Kayıtlar başarı ile eklendi."
        ]);
        exit;
    }
    echo json_encode([
        "result" => false,
        "message" => "Bilgiler eklenirken bir sorun oluştu.."
    ]);
    exit;

}catch(Throwable $e){
    echo json_encode([
        "result" => false,
        "message" => "Bir hata oluştu."
    ]);
    exit;
}