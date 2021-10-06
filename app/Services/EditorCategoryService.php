<?php

namespace Project\Services;

use Project\Repositories\EditorCategoryRepository;
use Project\Helper\Logging;
use Project\Models\User;
use Project\Services\UserService;
use Project\Helper\Authentication;

class EditorCategoryService{
    public function addCategory(){
        $repo = new EditorCategoryRepository();
        $editor_id = $_POST["id"];
        $category_id = $_POST["category"];
        $userService = new UserService();
        $user = $userService->getUserById($editor_id);
        $repo->getAllById($user);
        $isContain = $this->checkCategory($user->getCategories(), $category_id);
        if($isContain == true)
        {
            return array(0,"Bu kategori zaten bu editörde ekli");
        }
        $result = $repo->create($editor_id, $category_id);
        if ($result[0] == 1)
        {
            Logging::info(Authentication::getUser(),$editor_id." id'li Editöre kategori eklendi");
        }
        else
        {
            Logging::emergency(Authentication::getUser(),$editor_id." id'li Editöre kategori eklerken hata oluştu");
        }
        return $result;
    }

    public function getCategoriesById(User $user){
        $repo = new EditorCategoryRepository();
        $result = $repo->getAllById($user);
        Logging::info(Authentication::getUser(),$user->getId()." id'li kullanıcının kategorileri çekildi");
        return $result;

    }

    public function deleteCategory(){
        $editor_id = $_GET["id"];
        $category_id = $_GET["category"];
        $repo = new EditorCategoryRepository();
        $result = $repo->deleteEditorCategoryById($editor_id, $category_id);
        
        if($result == false){
            Logging::emergency(Authentication::getUser(),"Editör kategorisi silinirken bir hata oluştu.");
            return false;
        }
        Logging::info(Authentication::getUser(),"Editör kategorisi başarıyla silindi.");
        return true;
    }

    public function updateTime(){
        $time = $_GET["time"];
        if (strlen($time) < 1)
        {
            return array(0,"Alan boş bırakılamaz.");
        }
        $repo = new EditorCategoryRepository();
        $result = $repo->updateTime($time);
        if($result == false){
            Logging::emergency(Authentication::getUser(),"Editör güncelleme zamanı güncellenirken bir hata oluştu.");
            return $result;
        }
        Logging::info(Authentication::getUser(),"Editör güncelleme zamanı başarıyla güncellendi.");
        return $result;
    }

    public function getUpdateTime(){
        $repo = new EditorCategoryRepository();
        $result = $repo->getEditorUpdateTime();
        if($result == false){
            Logging::emergency(Authentication::getUser(),"Editör güncelleme zamanı veritabanından çekilirken bir hata oluştu.");
            return false;
        }
        Logging::info(Authentication::getUser(),"Editör güncelleme zamanı başarıyla veritabanından çekildi.");
        return $result;
    }

    private function checkCategory($array, $category_id){
        if ($array == null)
        {
            return false;
        }
        foreach ($array as $category)
        {
            if ($category->getId() == $category_id)
            {
                return true;
            }
        }
        return false;
    }
}