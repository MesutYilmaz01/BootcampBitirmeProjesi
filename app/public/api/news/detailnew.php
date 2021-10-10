<?php

use Project\Helper\Authentication;
use Project\Services\NewsService;
use Project\Services\UserService;

$service = new NewsService();
$userService = new UserService();

$data = $service->getNewByIdForAPI();
try{
    if(Authentication::check())
    {
        $result = $userService->addNewHistoryForAPI(Authentication::getUser()->getId(),$data->getId());
    }
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