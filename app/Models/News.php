<?php

namespace Project\Models;

class News{
    public function __construct(private $title, private $content, private $categories, private $img)
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
    public function getCategories(){
        return $this->categories;
    }
    public function setCategories(array $categories){
        $this->categories = $categories;
    }
    public function getImg(){
        return $this->img;
    }
    public function setImg(string $img){
        $this->img = $img;
    }
}