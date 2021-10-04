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

    public function create(News $data){
        $query = $this->db->prepare("INSERT INTO news 
        (title,content,category,img,created_at,updated_at)
        VALUES (?,?,?,?,?,?)");

        $insert = $query->execute(array(
            $data->getTitle(), $data->getContent(), $data->getCategory(), 
            $data->getImg(), $data->getCreatedAt(), $data->getUpdatedAt()
        ));
        if ($insert)
        {
            $last_id = $this->db->lastInsertId();
            return array(1,"Haber başarı ile eklendi.");
        }
        return array(0,"Haber eklerken bir hata oluştu.");
        
    }

    public function update(News $data){
        $sql = "UPDATE news SET title=?, content=?, category=?, img=?, created_at=?, updated_at=? WHERE id=?";
        $stmt= $this->db->prepare($sql);
        $result = $stmt->execute([$data->getTitle(), $data->getContent(), $data->getCategory(), 
                                $data->getImg(), $data->getCreatedAt(), $data->getUpdatedAt(), $data->getId()]);
        if ($result) 
        {
            return array(1,"Haber başarı ile güncellendi.");
        }
        return array(0,"Haber güncellenirken bir hata oluştu.");
    }

    public function delete($id){
        $isExist = $this->selectById($id);
        if ($isExist)
        {            
            $data = null;
            $sql = "DELETE FROM news WHERE id=?";
            $stmt= $this->db->prepare($sql);
            $data = $stmt->execute([$id]);
            return $data;
        }
        return false;
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

    public function selectById($id){
        $data = null;
        $stmt = $this->db->prepare("SELECT * FROM news WHERE id=?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(); 
        if ($data == false)
        {
            return false;
        }

        $news = new News();
        $news->setId($data["id"]);
        $news->setTitle($data["title"]);
        $news->setContent($data["content"]);
        $news->setCategory($data["category"]);
        $news->setImg($data["img"]);
        $news->setCreatedAt($data["created_at"]);
        $news->setUpdatedAt($data["updated_at"]);
        return $news;
    }

    public function selectAllWithLimit($pagesStarts, $limit){
        $model = array();
        $query = $this->db->query("SELECT * FROM news order by id desc limit $pagesStarts, $limit");
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

}