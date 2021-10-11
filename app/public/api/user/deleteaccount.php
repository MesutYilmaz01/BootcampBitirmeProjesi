<?php

use Project\Services\UserService;

try{
    $service = new UserService();
    if (!isset($_GET["token"]))
    {
        http_response_code(401);
        echo json_encode([
            "result" => false,
            "message" => "Oturum açılamadı..."
        ]);
        exit;
    }
    $user = $service->deleteUser();
    if ($user == false)
    {
        echo json_encode([
            "result" => false,
            "message" => "Kullanıcı silinme listesine eklenirken bir hata oluştu"
        ]);
        exit;
    }
    echo json_encode([
        "result" => true,
        "message" => "Kullanıcı başarıyla silinme listesine eklendi"
    ]);
    exit;


}catch(Throwable $e){
    echo json_encode([
        "result" => false,
        "message" => "Beklenmedik bir hata oluştu"
    ]);
    exit;
}