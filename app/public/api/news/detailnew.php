<?php

use Project\Services\NewsService;

$service = new NewsService();

$data = $service->getNewByIdForAPI();

try{
    if ($data == false)
    {
        http_response_code(404);
        echo json_encode([
            "result"        => false,
            "message"       => "Haber çekilirken bir hata oluştu"
        ]);
        exit;
    }
    echo json_encode([
        "result"        =>  true,
        "id"            =>  $data->getId(),
        "title"         =>  $data->getTitle(),
        "content"       =>  $data->getContent(),
        "category"      =>  $data->getCategory(),
        "img"           =>  $data->getImg()
    ]);
    exit;

}catch(Throwable $e){

    echo json_encode([
        "result"        =>  false,
        "message"       => "Bir hata oluştu"
    ]);
}