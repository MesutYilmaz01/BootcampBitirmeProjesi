<?php

use Project\Services\CommentService;
use Project\Services\UserService;

$service = new CommentService();
$userService = new UserService();

try{

    $new_id = $_POST["id"];
    $comment = $_POST["comment"];
    $anonim = $_POST["anonim"];
    $user_id = 0;
    if (isset($_GET["token"]))
    {
        $user = $userService->getUserByToken();
        if ($user)
        {
            if ($anonim == "true")
            {
                $user_id = 0;
            }
            else
            {
                $user_id = $user->getId();
            }
        }
        else
        {
            echo json_encode([
                "result" => false,
                "message" => "Böyle bir kullanıcı yok."
            ]);
            exit;
        }

    }
    else if (!isset($_GET["token"]))
    {
        $user_id = 0;
    }

    $result = $service->create($user_id, $new_id, $comment);

    if ($result == false)
    {
        echo json_encode([
            "result" => false,
            "message" => "Yorum eklenirken bir hata oluştu"
        ]);
        exit;
    }
    echo json_encode([
        "result" => true,
        "data" => "Yorum başarılı bir şekilde kaydedildi."
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



