<?php

namespace Project\Models;

class Category{
    private $id;
    private $category;
    private $created_at;
    private $updated_at; 
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
    public function getCreatedAt(){
        return $this->created_at;
    }
    public function setCreatedAt($date){
        $this->created_at = $date;
    }
    public function getUpdatedAt(){
        return $this->updated_at;
    }
    public function setUpdatedAt($date){
        $this->updated_at = $date;
    }
}