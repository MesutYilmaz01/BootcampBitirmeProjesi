<?php

namespace Project\Models;

class User{
    public const ADMIN_ROLE = 1;
    public const MODERATOR_ROLE = 2;
    public const EDITOR_ROLE = 3;
    public const USER_ROLE = 4;

    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $type;
    private $created_at;
    private $updated_at;
    private $categories;
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getSurname(){
        return $this->surname;
    }
    public function setSurname($surname){
        $this->surname = $surname;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getType(){
        return $this->type;
    }
    public function setType($type){
        $this->type = $type;
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
    public function getCategories(){
        return $this->categories;
    }
    public function setCategories($category){
        $this->categories[] = $category;
    }
}