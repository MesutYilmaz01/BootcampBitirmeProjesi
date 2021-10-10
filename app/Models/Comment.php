<?php

namespace Project\Models;

class Comment{
    private $id;
    private $user_id;
    private $new_id;
    private $comment;
    private $approve;
    private $created_at;
    private $updated_at; 
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getUserId(){
        return $this->user_id;
    }
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }
    public function getNewId(){
        return $this->new_id;
    }
    public function setNewId($new_id){
        $this->new_id = $new_id;
    }
    public function getComment(){
        return $this->comment;
    }
    public function setComment($comment){
        $this->comment = $comment;
    }
    public function getApprove(){
        return $this->approve;
    }
    public function setApprove($approve){
        $this->approve = $approve;
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