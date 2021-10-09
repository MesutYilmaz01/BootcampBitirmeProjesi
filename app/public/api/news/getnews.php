<?php

use Project\Services\NewsService;

$service = new NewsService();

try{
    $pageNumber = "";
    $isExist = isset($_GET["page"]);
    if ($isExist == true) 
    {
        $pageNumber = $_GET["page"];
    }
    else
    {
        $pageNumber = 1;
    }

    $count = $service->getCountForAPI();


    if ($pageNumber > ceil(count($count) / 20) || $pageNumber < 1)
    {
        http_response_code(400);
        echo json_encode([
            "result" => false,
            "message" => "Sayfa sayısını aştınız..."
        ]);
        exit;
    }

    
    $result = $service->getNewsForAPI($pageNumber);

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
            ];
        }
        echo json_encode([
            "result" => true,
            "data" => [
                "page"      => $pageNumber,
                "news"      => $finalData
            ]
        ]);
}
catch(\Throwable $e)
{
    http_response_code(400);
    echo json_encode([
        "result" => false,
        "message" => "Olmayan kategori girildi..."
    ]);
    exit;
}



