<?php

namespace Project\Models;

class Category{
    private int $id;
    private string $category;
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getCategory(){
        return $this->category;
    }
    public function setCategory($category){
        $this->category = $category;
    }
}