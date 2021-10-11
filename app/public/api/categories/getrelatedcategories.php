<?php

use Project\Services\UserService;

$userService = new UserService();

try{

    $categories = $userService->getRelatedCategories();

    if ($categories == false)
    {
        echo json_encode([
            "result" => false,
            "message" => "Kategorileri çekerken bir hata oluştu"
        ]);
        exit;
    }


    echo json_encode([
        "result" => true,
        "data" => [
            "categories"      => $categories
        ]
    ]);
    exit;
}
catch(\Throwable $e)
{
    http_response_code(400);
    echo json_encode([
        "result" => false,
        "message" => "Birşeyler ters gitti..."
    ]);
    exit;
}



