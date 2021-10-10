<?

use Project\Services\NewsService;

try{
    $service = new NewsService();
    $result = $service->getNewsForHistory();
    if ($result == false)
    {
        http_response_code(404);
        echo json_encode([
            "result"        => false,
            "message"       => "Haber geçmişi çekilirken bir hata oluştu"
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
                "created"   => $data->getCreatedAt(),
            ];
    }
        echo json_encode([
            "result" => true,
            "data" => [
                "news"      => $finalData
            ]
        ]);
    
}catch(Throwable $e){
    echo json_encode([
        "result"        =>  false,
        "message"       => "Bir hata oluştu"
    ]);
}