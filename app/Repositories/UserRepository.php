<?php

namespace Project\Repositories;

use Project\Models\User as User;
use Project\Database\Database as Database;
use Project\Helper\Authentication;

class UserRepository{
    private $db;
    public function __construct()
    {
        $db = new Database();
        $this->db = $db->getDb();
    }

    public function create(User $user){
        $query = $this->db->prepare("INSERT INTO users 
        (name,surname,email,password,type,token,created_at,updated_at)
        VALUES (?,?,?,?,?,?,?,?)");
        $insert = $query->execute(array(
            $user->getName(), $user->getSurname(), $user->getEmail(), $user->getPassword(), 
            $user->getType(), $user->getToken(), $user->getCreatedAt(), $user->getUpdatedAt()
        ));
        if ($insert)
        {
            $last_id = $this->db->lastInsertId();
            return array(1,"Kullanıcı başarı ile eklendi.");
        }
        return array(0,"Kullanıcı eklerken bir hata oluştu.");
    }

    public function createNewHistory($user,$new){
        $query = $this->db->prepare("INSERT INTO news_history 
        (user_id,new_id,created_at)
        VALUES (?,?,?)");
        $insert = $query->execute(array(
            $user, $new, date("d-m-Y h:i")
        ));
        if ($insert)
        {
            $last_id = $this->db->lastInsertId();
            return array(1,"Haber geçmişi başarı ile eklendi.");
        }
        return array(0,"Haber geçmişi eklerken bir hata oluştu.");
    }

    public function addToDeleteList($user_id){
        $query = $this->db->prepare("INSERT INTO waitings_deletion 
        (user_id,is_deleted,created_at,updated_at)
        VALUES (?,?,?,?)");
        $insert = $query->execute(array(
            $user_id, 0, date("d-m-Y h:i"),date("d-m-Y h:i")
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
            $tempNew->setToken($row["token"]);
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
        $news->setToken($data["token"]);
        $news->setCreatedAt($data["created_at"]);
        $news->setUpdatedAt($data["updated_at"]);
        return $news;

    }

    public function selectByToken($token){
        $data = null;
        $stmt = $this->db->prepare("SELECT * FROM users WHERE token=?");
        $stmt->execute([$token]);
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
        $news->setToken($data["token"]);
        $news->setCreatedAt($data["created_at"]);
        $news->setUpdatedAt($data["updated_at"]);
        return $news;

    }

    public function deleteFromWaitings($id){
            $data = null;
            $sql = "DELETE FROM waitings_deletion WHERE user_id=?";
            $stmt= $this->db->prepare($sql);
            $data = $stmt->execute([$id]);
            return $data;
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
            $tempNew->setToken($row["token"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $model[] = $tempNew;
        }

        return $model;
    }

    public function selectWaitingsPagination($pagesStarts, $limit){
        $model = array();
        $query = $this->db->query("SELECT u.id as uid, u.name, u.surname, u.type,d.id, d.who_delete, d.is_deleted, d.created_at, d.updated_at FROM waitings_deletion d INNER JOIN users u ON u.id = d.user_id ORDER BY d.id DESC limit $pagesStarts,$limit");
        while ($row = $query->fetch()) {
            $tempNew = [
                "id"        => $row["uid"],
                "name"      => $row["name"],
                "surname"   => $row["surname"],
                "type"      => $row["type"],
                "who_delete"=> $row["who_delete"],
                "is_deleted"=> $row["is_deleted"],
                "created_at"=> $row["created_at"],
                "updated_at"=> $row["updated_at"],
            ];
            $model[] = $tempNew;
        }

        return $model;
    }
    public function selectDeleteList(){
        $model = array();
        $query = $this->db->query("SELECT u.name, u.surname, u.type,d.id, d.who_delete, d.is_deleted, d.created_at, d.updated_at FROM waitings_deletion d INNER JOIN users u ON u.id = d.user_id ORDER BY d.id DESC");
        while ($row = $query->fetch()) {
            $tempNew = [
                "name"      => $row["name"],
                "surname"   => $row["surname"],
                "type"      => $row["type"],
                "who_delete"=> $row["who_delete"],
                "is_deleted"=> $row["is_deleted"],
                "created_at"=> $row["created_at"],
                "updated_at"=> $row["updated_at"],
            ];
            $model[] = $tempNew;
        }

        return $model;
    }

    public function getAllForModerator($pagesStarts, $limit){
        $model = array();
        $query = $this->db->query("SELECT * FROM users WHERE type=3 OR type=4 order by id desc limit $pagesStarts, $limit");
        while ($row = $query->fetch()) {
            $tempNew = new User();
            $tempNew->setId($row["id"]);
            $tempNew->setName($row["name"]);
            $tempNew->setSurname($row["surname"]);
            $tempNew->setEmail($row["email"]);
            $tempNew->setPassword($row["password"]);
            $tempNew->setType($row["type"]);
            $tempNew->setToken($row["token"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $model[] = $tempNew;
        }
        return $model;
    }

    public function getCountForModerator(){
        $model = array();
        $query = $this->db->query("SELECT * FROM users WHERE type=3 OR type=4 order by id desc");
        while ($row = $query->fetch()) {
            $tempNew = new User();
            $tempNew->setId($row["id"]);
            $tempNew->setName($row["name"]);
            $tempNew->setSurname($row["surname"]);
            $tempNew->setEmail($row["email"]);
            $tempNew->setPassword($row["password"]);
            $tempNew->setType($row["type"]);
            $tempNew->setToken($row["token"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $model[] = $tempNew;
        }
        return $model;
    }
}