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

    public function update(User $user){
        $sql = "UPDATE users SET name=?, surname=?, email=?, password=?, type=?, created_at=?, updated_at=? WHERE id=?";
        $stmt= $this->db->prepare($sql);
        $result = $stmt->execute([$user->getName(), $user->getSurname(), $user->getEmail(), 
                                $user->getPassword(), $user->getType(), $user->getCreatedAt(), $user->getUpdatedAt(), $user->getId()]);
        if ($result) 
        {
            return array(1,"Kullanıcı blgileri başarı ile güncellendi.");
        }
        return array(0,"Kullanıcı güncellenirken bir hata oluştu.");

    }

    public function delete($id){
        $isExist = $this->selectById($id);
        if ($isExist)
        {
            $data = null;
            $sql = "DELETE FROM users WHERE id=?";
            $stmt= $this->db->prepare($sql);
            $data = $stmt->execute([$id]);
            return $data;
        }
        return false;
    }

    public function select(){
        $model = array();
        $query = $this->db->query("SELECT * FROM users");
        while ($row = $query->fetch()) {
            $tempNew = new User();
            $tempNew->setId($row["id"]);
            $tempNew->setName($row["name"]);
            $tempNew->setSurname($row["surname"]);
            $tempNew->setEmail($row["email"]);
            $tempNew->setPassword($row["password"]);
            $tempNew->setType($row["type"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $model[] = $tempNew;
        }

        return $model;
    }

    public function selectById($id){
        $data = null;
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        if ($data == false)
        {
            return false;
        }
        $news = new User();
        $news->setId($data["id"]);
        $news->setName($data["name"]);
        $news->setSurname($data["surname"]);
        $news->setEmail($data["email"]);
        $news->setPassword($data["password"]);
        $news->setType($data["type"]);
        $news->setCreatedAt($data["created_at"]);
        $news->setUpdatedAt($data["updated_at"]);
        return $news;

    }
    public function selectByEmail($email){
        $data = null;
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        $data = $stmt->fetch();
        if ($data != false)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function selectAllWithLimit($pagesStarts, $limit){
        $model = array();
        $query = $this->db->query("SELECT * FROM users order by id desc limit $pagesStarts, $limit");
        while ($row = $query->fetch()) {
            $tempNew = new User();
            $tempNew->setId($row["id"]);
            $tempNew->setName($row["name"]);
            $tempNew->setSurname($row["surname"]);
            $tempNew->setEmail($row["email"]);
            $tempNew->setPassword($row["password"]);
            $tempNew->setType($row["type"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $model[] = $tempNew;
        }

        return $model;
    }
}