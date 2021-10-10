<?php

use Project\Services\CommentService;

$service = new CommentService();

try{
    $result = $service->selectForNews();
    $finalData = [];
    foreach ($result as $data)
    {
            $finalData[] = [
                "id"            => $data->getId(),
                "name"          => $data->getUserId(),
                "surname"       => $data->getNewId(),
                "comment"       => $data->getComment(),
                "created"       => $data->getCreatedAt(),
            ];
    }
        echo json_encode([
            "result" => true,
            "data" => [
                "comments"      => $finalData
            ]
        ]);
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



