<?php

namespace Project\Services;

use Project\Repositories\NewsRepository as NewsRepository;

class NewsService{

    public function addToDatabase(): bool{
        $data = [
            'title' => $_POST["title"],
            'content' => $_POST["content"],
            'category' => $_POST["category"],
            'img' => $_FILES["img"]["name"]
        ];
        $repo = new NewsRepository();
        $result = $repo->create($data);
        if ($result)
        {
            return true;
        }
        return false;
    }

    public function updateNews($oldData): bool{
        $data = [
            'id' => $oldData["id"],
            'title' => $_POST["title"],
            'content' => $_POST["content"],
            'category' => $_POST["category"],
            'img' => $_FILES["img"] == "" ? $oldData["img"] :  $_FILES["img"]["name"],
            'created_at' => $oldData["created_at"],
            'updated_at' => date('d-m-Y-h:i')
        ];

        $repo = new NewsRepository();
        $result = $repo->update($data);
        return $result;
    }

    public function getAllFromDatabase(){
        $repo = new NewsRepository();
        $data = $repo->select();
        return $data;
    }

    public function getNewsById(){
         $repo = new NewsRepository();
         $data = $repo->selectById();
         return $data;
    }
}