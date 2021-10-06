<?php

namespace Project\Services;

use Project\Helper\Authentication;
use Project\Models\Category as Category;
use Project\Repositories\CategoryRepository as CategoryRepository;
use Project\Helper\Logging;

class CategoriesService{
    public function addToDatabase(){
        if (strlen($_POST["category"]) > 2)
        {            
            $data = new Category();
            $data->setCategory($_POST["category"]);
            $data->setCreatedAt(date('d-m-Y-h:i'));
            $data->setUpdatedAt(date('d-m-Y-h:i'));
            $repo = new CategoryRepository();
            $result = $repo->create($data);
            if ($result[0] == 1)
            {
                Logging::info(Authentication::getUser(),$data->getId()." Id'li kategori başarılı bir şekilde veritabanına eklendi");
            }
            else
            {
                Logging::emergency(Authentication::getUser(),"Veritabanına kategori eklenirken bir hata oluştu.");
            }
            return $result;
        }
        return array(0,"Kategori adı en az 3 karakter olmalı.");
    }
    public function updateCategory(Category $category){
        if (strlen($_POST["category"]) > 2)
        {  
            $data = new Category();
            $data->setId($category->getId());
            $data->setCategory($_POST["category"]);
            $data->setCreatedAt($category->getCreatedAt());
            $data->setUpdatedAt(date('d-m-Y-h:i'));
            $repo = new CategoryRepository();
            $result = $repo->update($data);
            if ($result[0] == 1)
            {
                Logging::info(Authentication::getUser(),$data->getId()." Id'li kategori başarılı bir şekilde güncellendi");
            }
            else
            {
                Logging::emergency(Authentication::getUser(),$data->getId()." Id'li kategori veritabanına eklenirken bir hata oluştu.");
            }
            return $result;
        }
        return array(0,"Kategori adı en az 3 karakter olmalı.");

    }
    public function deleteCategoryById(){
        $id = $_GET["id"];
        $repo = new CategoryRepository();
        $result = $repo->delete($id);
        if ($result == false)
        {
            Logging::emergency(Authentication::getUser(),$id." id'li kategori veritabanından silinemedi.");
            return false;
        }
        Logging::info(Authentication::getUser(),$id." id'li kategori veritabanından silindi.");
        return $result;
    }
    public function getCategories(){
        $repo = new CategoryRepository();
        $result = $repo->select();
        Logging::info(Authentication::getUser(),"Veritabanından tüm kategoriler çekildi");
        return $result;
    }
    public function getCategoryById($id){
        $repo = new CategoryRepository();
        $result = $repo->selectById($id);
        if ($result == false)
        {
            Logging::emergency(Authentication::getUser(),$id." id'li kategori veritabanından çekilemedi.");
            return false;
        }
        Logging::info(Authentication::getUser(),$id." id'li kategori veritabanından çekildi.");
        return $result;
    }

    public function getPaginatedCategories($page){
        if (empty($page) || !is_numeric($page))
        {
            $page = 1;
        }
        $limit = 5;
        $repo = new CategoryRepository();
        $pageStarts = ($page*$limit) - $limit;
        $data = $repo->selectAllWithLimit($pageStarts, $limit);
        Logging::info(Authentication::getUser(),"Veritabanından Kategoriler Sayfası İçin Kategoriler Çekildi");
        return $data;
    }
}