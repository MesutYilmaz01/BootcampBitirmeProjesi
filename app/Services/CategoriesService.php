<?php

namespace Project\Services;

use Project\Models\Category as Category;
use Project\Repositories\CategoryRepository as CategoryRepository;

class CategoriesService{
    public function addToDatabase(){
        $data = new Category();
        $data->setCategory($_POST["category"]);
        $data->setCreatedAt(date('d-m-Y-h:i'));
        $data->setUpdatedAt(date('d-m-Y-h:i'));
        $repo = new CategoryRepository();
        $result = $repo->create($data);
        return $result;
    }
    public function updateCategory(Category $category){
        $data = new Category();
        $data->setId($category->getId());
        $data->setCategory($_POST["category"]);
        $data->setCreatedAt($category->getCreatedAt());
        $data->setUpdatedAt(date('d-m-Y-h:i'));
        $repo = new CategoryRepository();
        $result = $repo->update($data);
        return $result;

    }
    public function deleteCategoryById(){
        $repo = new CategoryRepository();
        $result = $repo->delete();
        return $result;
    }
    public function getCategories(){
        $repo = new CategoryRepository();
        $result = $repo->select();
        return $result;
    }
    public function getCategoryById($id){
        $repo = new CategoryRepository();
        $result = $repo->selectById($id);
        return $result;
    }
}