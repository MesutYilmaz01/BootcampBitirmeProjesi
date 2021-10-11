<?php

use Project\Services\NewsService;

$service = new NewsService();

try{
    
    $result = $service->getNewsForUser();

    if ($result == false)
    {
        echo json_encode([
            "result" => false,
            "message" => "Haberleri çekerken bir hata oluştu"
        ]);
        exit;
    }

    $finalData = [];

    foreach ($result as $data)
    {
            $finalData[] = [
                "id"        => $data->getId(),
                "title"     => $data->getTitle(),
                "content"   => $data->getContent(),
                "category"  => $data->getCategory(),
                "img"       => $data->getImg(),
                "created"       => $data->getCreatedAt(),
            ];
        }
        echo json_encode([
            "result" => true,
            "data" => [
                "news"      => $finalData
            ]
        ]);
}
catch(\Throwable $e)
{
    http_response_code(400);
    echo json_encode([
        "result" => false,
        "message" => "Olmayan kategori girildi...".$e->getMessage()
    ]);
    exit;
}



