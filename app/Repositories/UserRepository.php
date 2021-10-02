<?php

namespace Project\Repositories;

use Project\Models\User as User;
use Project\Database\Database as Database;

class UserRepository{
    private $db;
    public function __construct()
    {
        $db = new Database();
        $this->db = $db->getDb();
    }
    public function create(User $user){
        $query = $this->db->prepare("INSERT INTO users 
        (name,surname,email,password,type,created_at,updated_at)
        VALUES (?,?,?,?,?,?,?)");
        $insert = $query->execute(array(
            $user->getName(), $user->getSurname(), $user->getEmail(), 
            $user->getPassword(), $user->getType(), $user->getCreatedAt(), $user->getUpdatedAt()
        ));
        if ($insert)
        {
            $last_id = $this->db->lastInsertId();
            return array(1,"Kullanıcı başarı ile eklendi.");
        }
        return array(0,"Kullanıcı eklerken bir hata oluştu.");
    }
    public function update(){

    }
    public function delete(){

    }
    public function select(){
        
    }

}