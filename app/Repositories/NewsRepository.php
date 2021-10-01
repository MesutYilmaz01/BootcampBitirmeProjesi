<?php

namespace Project\Repositories;

use DateTime;
use Project\Models\News as News;
use Project\Database\Database as Database;

class NewsRepository{
    private $db;
    public function __construct()
    {   
        $db = new Database();
        $this->db = $db->getDb();

    }
    public function create(array $data): bool{
        $query = $this->db->prepare("INSERT INTO news 
        (title,content,category,img,created_at,updated_at)
        VALUES (?,?,?,?,?,?)");

        $insert = $query->execute(array(
            $data["title"], $data["content"], $data["category"], $data["img"], date('d-m-Y:h:i'), date('d-m-Y-h:i')
        ));

        if ($insert)
        {
            $last_id = $this->db->lastInsertId();
            return true;
        }
        return false;
        
    }
    public function update(array $data): bool{
        $sql = "UPDATE news SET title=?, content=?, category=?, img=?, created_at=?, updated_at=? WHERE id=?";
        $stmt= $this->db->prepare($sql);
        $result = $stmt->execute([$data["title"], $data["content"], $data["category"], $data["img"], $data["created_at"], $data["updated_at"], $data["id"]]);
        return $result;
    }
    public function delete(){

    }
    public function select(){
        $model = array();
        $query = $this->db->query("SELECT * FROM news");
        while ($row = $query->fetch()) {
            $tempNew = new News();
            $tempNew->setId($row["id"]);
            $tempNew->setTitle($row["title"]);
            $tempNew->setContent($row["content"]);
            $tempNew->setCategory($row["category"]);
            $tempNew->setImg($row["img"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $model[] = $tempNew;
        }

        return $model;
        
    }
    public function selectById(){
        $data = null;
        $id = $_GET["id"];
        $stmt = $this->db->prepare("SELECT * FROM news WHERE id=?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(); 
        return $data;
    }

}