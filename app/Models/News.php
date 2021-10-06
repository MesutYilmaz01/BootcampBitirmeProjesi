<?php

namespace Project\Models;

class News{
    private $id;
    private $user_id;
    private $title;
    private $content;
    private $category;
    private $img;
    private $publish;
    private $created_at;
    private $updated_at;
    public function __construct()
    {}
    public function getTitle(){
        return $this->title;
    }
    public function setTitle(string $title){
        $this->title = $title;
    }
    public function getContent(){
        return $this->content;
    }
    public function setContent(string $content){
        $this->content = $content;
    }
    public function getCategory(){
        return $this->category;
    }
    public function setCategory($category){
        $this->category = $category;
    }
    public function getImg(){
        return $this->img;
    }
    public function setImg(string $img){
        $this->img = $img;
    }
    public function getPublish(){
        return $this->publish;
    }
    public function setPublish($number){
        $this->publish = $number;
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
    public function getId(){
        return $this->id;
    }
    public function setId($number){
        $this->id = $number;
    }
    public function getUserId(){
        return $this->user_id;
    }
    public function setUserId($id){
        $this->user_id = $id;
    }
}