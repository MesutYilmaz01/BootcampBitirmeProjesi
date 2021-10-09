<?php

namespace Project\Services;

use Project\Models\News;
use Project\Repositories\NewsRepository as NewsRepository;
use Project\Helper\Logging as Logging;
use Project\Helper\Authentication;
use Project\Helper\Authorization;
use Project\Services\EditorCategoryService;

class NewsService{

    public function addToDatabase(){
        if (strlen($_POST["title"]) > 45)
        {
            if (strlen($_POST["content"]) > 150)
            {
                $imgPath = $this->saveImg();
                if ($imgPath[0] == 1)
                {
                    $published = 0;
                    if(isset($_POST["publish"]))
                    {
                        $published = 1;
                    }
                    $data = new News();
                    $data->setTitle($_POST["title"]);
                    $data->setUserId(Authentication::getUser()->getId());
                    $data->setContent($_POST["content"]);
                    $data->setCategory($_POST["category"]);
                    $data->setCreatedAt(date('d-m-Y-h:i'));
                    $data->setUpdatedAt(date('d-m-Y-h:i'));
                    $data->setImg($imgPath[1]);
                    $data->setPublish($published);
                    $repo = new NewsRepository();
                    //Kategori kullanıcıda ekli ise ekleme yapabilir. Yetkisi olmayan idyi eklememeli.
                    if (Authorization::isEditor())
                    {
                        $control = $this->isExistInUser();
                        if($_POST["category"] == null || $control == false)
                        {
                            return array(0,"Kategori alanınını kontrol ediniz.");
                        }
                    }
                    $result = $repo->create($data);
                    if ($result[0] == 1)
                    {
                        Logging::info(Authentication::getUser(),$data->getId()." id'li Haber başarılı bir şekilde veritabanına eklendi");
                    }
                    else
                    {
                        Logging::emergency(Authentication::getUser(),"Haber veritabanına eklenemedi");
                    }
                    return $result;
                }
                Logging::emergency(Authentication::getUser(),"Haber resmi kayıt edilemedi");
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
                    $published = 0;
                    if(isset($_POST["publish"]))
                    {
                        $published = 1;
                    }
                    if($_POST["category"] == null)
                    {
                        return array(0,"Lütfen kategori seçiminizi kontrol ediniz.");
                    }
                    $data = new News();
                    $data->setId($oldData->getId());
                    $data->setTitle($_POST["title"]);
                    $data->setContent($_POST["content"]);
                    $data->setCategory($_POST["category"]);
                    $img = $_FILES["img"]["name"] == "" ? $oldData->getImg() :  $imgPath[1];
                    $data->setImg($img);
                    $data->setPublish($published);
                    $data->setCreatedAt($oldData->getCreatedAt());
                    $data->setUpdatedAt(date('d-m-Y-h:i'));
                    $repo = new NewsRepository();
                    $result = $repo->update($data);
                    if ($result[0] == 1)
                    {
                        Logging::info(Authentication::getUser(),$data->getId()." id'li haber başarılı bir şekilde güncellendi");
                    }
                    else
                    {
                        Logging::emergency(Authentication::getUser(),$data->getId()."Haber güncellenemedi");
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
        if (Authorization::isEditor())
        {            
            $service = new EditorCategoryService();
            $time = $service->getUpdateTime();
            $data = $repo->selectCountForEditor($time);
            Logging::info(Authentication::getUser(),"Veritabanından Tüm Haberler Çekildi");
            return $data;
        }
        $data = $repo->select();
        Logging::info(Authentication::getUser(),"Veritabanından Tüm Haberler Çekildi");
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
        if (Authorization::isEditor())
        {
            $service = new EditorCategoryService();
            $time = $service->getUpdateTime();
            $data = $repo->selectAllForEditor($time);
            $finalData = array_slice($data,$pageStarts,5);
            Logging::info(Authentication::getUser(),"Veritabanından Haberler Sayfası İçin Haberler Çekildi");
            return $finalData;
        }
        $data = $repo->selectAllWithLimit($pageStarts, $limit);
        Logging::info(Authentication::getUser(),"Veritabanından Haberler Sayfası İçin Haberler Çekildi");
        return $data;
    }

    public function getForAdminIndex($limit){
        $repo = new NewsRepository();
        $data = $repo->selectAllWithLimit(0,$limit);
        Logging::info(Authentication::getUser(),"Veritabanından Index Sayfası İçin $limit kadar haber Çekildi");
        return $data;
    }

    public function getNewsById(){
        $id = $_GET["id"];
        $repo = new NewsRepository();
        $data = $repo->selectById($id);
        if ($data == false)
        {
            Logging::emergency(Authentication::getUser(),$id." id'li haber veritabanından çekilemedi.");
            return false;
        }
        Logging::info(Authentication::getUser(),$id." id'li haber veritabanından çekildi.");
        return $data;
    }

    public function deleteNewById(){
        $id = $_GET["id"];
        $repo = new NewsRepository();
        $data = $repo->delete($id);
        if ($data == false)
        {
            Logging::emergency(Authentication::getUser(),$id." id'li haber veritabanından silinemedi.");
            return false;
        }
        Logging::info(Authentication::getUser(),$id." id'li haber veritabanından silindi.");
        return $data;
    }

    public function getNewsForAPI($page){
        if (empty($page) || !is_numeric($page))
        {
            $page = 1;
        }
        $category = null;
        if (isset($_GET["category"]))
        {
            $category = $_GET["category"];
        }
        $limit = 20;
        $repo = new NewsRepository();
        $pageStarts = ($page*$limit) - $limit;
        $data = $repo->selectForAPI($pageStarts, $limit, $category);
        return $data;
    }

    public function getCountForAPI(){
        $category = null;
        if (isset($_GET["category"]))
        {
            $category = $_GET["category"];
        }
        $repo = new NewsRepository();
        $data = $repo->countForAPI($category);
        if ($data == false)
        {
            return false;
        }
        return $data;
    }

    public function getNewByIdForAPI(){
        $id = $_GET["id"];
        $repo = new NewsRepository();
        $data = $repo->selectByIDForAPI($id);
        if ($data == false)
        {
            return false;
        }
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

    public function validationForEditor(News $oldData)
    {
        //Moderatörün belirlediği azman
        $editorService = new EditorCategoryService();
        $time = $editorService->getUpdateTime();
        //Aralarındaki fark                    
        $now = time();
        $your_date = strtotime($oldData->getCreatedAt());
        $datediff = $now - $your_date;
        $days = round($datediff / (60 * 60 * 24));
        if ($days >= $time["time"] || 
            $oldData->getUserId() == Authentication::getUser()->getId() || 
            $oldData->getPublish() == 0)
        {
            return true;
        }
        Logging::alert(Authentication::getUser(),$oldData->getId()." id'li habere yetkisiz erişilmeye çalışıldı");
        return false;  
    }

    private function isExistInUser(){
        foreach(Authentication::getUser()->getCategories() as $category)
        {
            
            if ($_POST["category"] == $category->getId())
            {
                return true;
            }
        }
        return false;
    }
}