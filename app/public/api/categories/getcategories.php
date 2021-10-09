<?php

use Project\Services\CategoriesService;

$service = new CategoriesService();

try{

    $categories = $service->getCategories();

    if ($categories == false)
    {
        echo json_encode([
            "result" => false,
            "message" => "Kategorileri çekerken bir hata oluştu"
        ]);
        exit;
    }

    $finalData = [];

    foreach ($categories as $data)
    {
            $finalData[] = [
                "id"        => $data->getId(),
                "category"     => $data->getCategory(),
            ];
    }

    echo json_encode([
        "result" => true,
        "data" => [
            "categories"      => $finalData
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



