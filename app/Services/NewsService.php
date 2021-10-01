<?php

namespace Project\Services;

use Project\Models\News;
use Project\Repositories\NewsRepository as NewsRepository;

class NewsService{

    public function addToDatabase(){
        $imgPath = $this->saveImg();
        if ($imgPath[0] == 1)
        {
            $data = new News();
            $data->setTitle($_POST["title"]);
            $data->setContent($_POST["content"]);
            $data->setCategory($_POST["category"]);
            $data->setImg($imgPath[1]);
            $repo = new NewsRepository();
            $result = $repo->create($data);
            return $result;
        }
        return $imgPath;
        
    }

    public function updateNews(News $oldData){
        $imgPath = $this->saveImg();
        if ($imgPath[0] == 0 || $imgPath[0] == 1)
        {
            $data = new News();
            $data->setId($oldData->getId());
            $data->setTitle($_POST["title"]);
            $data->setContent($_POST["content"]);
            $data->setCategory($_POST["category"]);
            $img = $_FILES["img"]["name"] == "" ? $oldData->getImg() :  $imgPath[1];
            $data->setImg($img);
            $data->setCreatedAt($oldData->getCreatedAt());
            $data->setUpdatedAt(date('d-m-Y-h:i'));
            $repo = new NewsRepository();
            $result = $repo->update($data);
            return $result;
        }
        return $imgPath;
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
    public function deleteNewById(){
        $repo = new NewsRepository();
        $data = $repo->delete();
        return $data;
    }

    public function saveImg(){
        define ('SITE_ROOT', realpath(dirname(__FILE__)));
        $directory = SITE_ROOT."/../public/src/img/";
        $tmp_name = $_FILES["img"]["tmp_name"];
        $name = $_FILES["img"]["name"];
        $size = $_FILES["img"]["size"];
        $type = $_FILES["img"]["type"];
        $format = substr($name,-4,4);
        $randomNumber1 = rand(10000,50000);
        $randomNumber2 = rand(10000,50000);
        $imgName = $randomNumber1.$randomNumber2.$format;
        #resim mevcut değil ise
        if (strlen($name) == 0)
        {
            return array(0,"Resim mevcut değil.");
        }
        #resim boyutu 5 MB'dan fazla ise
        if ($size > (1024*1024*3))
        {
            return array(2,"Resim boyutu 5 MB'ı geçemez.");
        }
        if ($type != 'image/jpeg' && $type!= 'image/png' && $format != '.jpg')
        {
            return array(3,"Resim jpg veya png formatında olmalı.");
        }
        move_uploaded_file($tmp_name, $directory.''.$imgName);
        return array(1,'/public/src/img/'.$imgName);
    }
}