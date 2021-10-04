<?php

namespace Project\Services;

use Project\Models\News;
use Project\Repositories\NewsRepository as NewsRepository;
use Project\Helper\Logging as Logging;

class NewsService{

    public function addToDatabase(){
        if (strlen($_POST["title"]) > 45)
        {
            if (strlen($_POST["content"]) > 150)
            {
                $imgPath = $this->saveImg();
                if ($imgPath[0] == 1)
                {
                    $data = new News();
                    $data->setTitle($_POST["title"]);
                    $data->setContent($_POST["content"]);
                    $data->setCategory($_POST["category"]);
                    $data->setCreatedAt(date('d-m-Y-h:i'));
                    $data->setUpdatedAt(date('d-m-Y-h:i'));
                    $data->setImg($imgPath[1]);
                    $repo = new NewsRepository();
                    $result = $repo->create($data);
                    if ($result[0] == 1)
                    {
                        Logging::info($data->getId()." id'li Haber başarılı bir şekilde veritabanına eklendi");
                    }
                    else
                    {
                        Logging::emergency("Haber veritabanına eklenemedi");
                    }
                    return $result;
                }
                Logging::emergency("Haber resmi kayıt edilemedi");
                return $imgPath;
            }
            return array(0,"Haber içeriği en az 150 karakter olmalı.");
        }
        return array(0,"Haber başlığı en az 45 karakter olmalı.");
        
    }

    public function updateNews(News $oldData){
        if (strlen($_POST["title"]) > 45)
        {
            if (strlen($_POST["content"]) > 150)
            {
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
                    if ($result[0] == 1)
                    {
                        Logging::info($data->getId()." id'li haber başarılı bir şekilde güncellendi");
                    }
                    else
                    {
                        Logging::emergency($data->getId()."Haber güncellenemedi");
                    }
                    return $result;
                }
                return $imgPath;
            }
            return array(0,"Haber içeriği en az 150 karakter olmalı.");
        }
        return array(0,"Haber başlığı en az 45 karakter olmalı.");
    }

    public function getAllFromDatabase(){
        $repo = new NewsRepository();
        $data = $repo->select();
        Logging::info("Veritabanından Tüm Haberler Çekildi");
        return $data;
    }

    public function getByLimit($page){
        if (empty($page) || !is_numeric($page))
        {
            $page = 1;
        }
        $limit = 5;
        $repo = new NewsRepository();
        $pageStarts = ($page*$limit) - $limit;
        $data = $repo->selectAllWithLimit($pageStarts, $limit);
        Logging::info("Veritabanından Haberler Sayfası İçin Haberler Çekildi");
        return $data;
    }

    public function getForAdminIndex($limit){
        $repo = new NewsRepository();
        $data = $repo->selectAllWithLimit($limit);
        Logging::info("Veritabanından Index Sayfası İçin $limit kadar haber Çekildi");
        return $data;
    }

    public function getNewsById(){
        $id = $_GET["id"];
        $repo = new NewsRepository();
        $data = $repo->selectById($id);
        if ($data == false)
        {
            Logging::emergency($id." id'li haber veritabanından çekilemedi.");
            return false;
        }
        Logging::info($id." id'li haber veritabanından çekildi.");
        return $data;
    }

    public function deleteNewById(){
        $id = $_GET["id"];
        $repo = new NewsRepository($id);
        $data = $repo->delete($id);
        if ($data == false)
        {
            Logging::emergency($id." id'li haber veritabanından silinemedi.");
            return false;
        }
        Logging::info($id." id'li haber veritabanından silindi.");
        return $data;
    }

    public function saveImg(){
        define ('SITE_ROOT', realpath(dirname(__FILE__)));
        $directory = SITE_ROOT."/../public/assets/img/";
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
        return array(1,'/assets/img/'.$imgName);
    }
}