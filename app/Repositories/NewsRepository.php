<?php

namespace Project\Repositories;

use DateTime;
use Project\Models\News as News;
use Project\Database\Database as Database;
use Project\Helper\Authentication;

class NewsRepository{
    private $db;
    public function __construct()
    {   
        $db = new Database();
        $this->db = $db->getDb();

    }

    public function create(News $data){
        $query = $this->db->prepare("INSERT INTO news 
        (user_id,title,content,category,img,published,created_at,updated_at)
        VALUES (?,?,?,?,?,?,?,?)");
        $insert = $query->execute(array(
            $data->getUserId(), $data->getTitle(), $data->getContent(), $data->getCategory(), 
            $data->getImg(), $data->getPublish(), $data->getCreatedAt(), $data->getUpdatedAt()
        ));
        if ($insert)
        {
            $last_id = $this->db->lastInsertId();
            return array(1,"Haber başarı ile eklendi.");
        }
        return array(0,"Haber eklerken bir hata oluştu.");
        
    }

    public function update(News $data){
        $sql = "UPDATE news SET title=?, content=?, category=?, img=?, published=?, created_at=?, updated_at=? WHERE id=?";
        $stmt= $this->db->prepare($sql);
        $result = $stmt->execute([$data->getTitle(), $data->getContent(), $data->getCategory(), $data->getImg(),
                 $data->getPublish(), $data->getCreatedAt(), $data->getUpdatedAt(), $data->getId()]);
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
            $tempNew->setUserId($row["user_id"]);
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
        $news->setUserId($data["user_id"]);
        $news->setTitle($data["title"]);
        $news->setContent($data["content"]);
        $news->setCategory($data["category"]);
        $news->setImg($data["img"]);
        $news->setPublish($data["published"]);
        $news->setCreatedAt($data["created_at"]);
        $news->setUpdatedAt($data["updated_at"]);
        return $news;
    }

    public function selectAllWithLimit($pagestarts, $limit){
        $model = array();
        $query = $this->db->query("SELECT * FROM news order by id desc limit $pagestarts,$limit");
        while ($row = $query->fetch()) {
            $tempNew = new News();
            $tempNew->setId($row["id"]);
            $tempNew->setUserId($row["user_id"]);
            $tempNew->setTitle($row["title"]);
            $tempNew->setContent($row["content"]);
            $tempNew->setCategory($row["category"]);
            $tempNew->setImg($row["img"]);
            $tempNew->setPublish($row["published"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $model[] = $tempNew;
        }
        return $model;
    }

    public function selectAllForEditor($time){
        $user_id =  Authentication::getUser()->getId();
        $model = array();
        $query = $this->db->query("SELECT * FROM news  order by id desc");
        while ($row = $query->fetch()) {
            $tempNew = new News();
            $tempNew->setId($row["id"]);
            $tempNew->setUserId($row["user_id"]);
            $tempNew->setTitle($row["title"]);
            $tempNew->setContent($row["content"]);
            $tempNew->setCategory($row["category"]);
            $tempNew->setImg($row["img"]);
            $tempNew->setPublish($row["published"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $now = time();
            $your_date = strtotime($row["created_at"]);
            $datediff = $now - $your_date;
            $days = round($datediff / (60 * 60 * 24));
            if ($days >= $time["time"] || $row["user_id"] == $user_id || $row["published"] == 0)
            {
                $model[] = $tempNew;
            }
        }
        return $model;   
    }

    public function selectCountForEditor($time){
        $model = array();
        $query = $this->db->query("SELECT * FROM news");
        while ($row = $query->fetch()) {
            $tempNew = new News();
            $tempNew->setId($row["id"]);
            $tempNew->setUserId($row["user_id"]);
            $tempNew->setTitle($row["title"]);
            $tempNew->setContent($row["content"]);
            $tempNew->setCategory($row["category"]);
            $tempNew->setImg($row["img"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $now = time();
            $your_date = strtotime($row["created_at"]);
            $datediff = $now - $your_date;
            $days = round($datediff / (60 * 60 * 24));
            if($days >= $time["time"] || $row["user_id"] == Authentication::getUser()->getId() || $row["published"] == 0)
            {
                $model[] = $tempNew;
            }
        }
        return $model;   
    }

    public function selectForAPI($pagestarts, $limit, $category=null){
        $model = array();
        $query = "";
        if ($category == null)
        {
            $query = $this->db->prepare("SELECT n.id,n.title,n.content,n.img,n.created_at,n.updated_at,c.category FROM news as n INNER JOIN categories as c ON n.category = c.id WHERE n.published = ? ORDER BY n.id DESC limit $pagestarts,$limit
        ");
            $query->execute([1]);
        }
        else
        {
            $query = $this->db->prepare("SELECT n.id,n.title,n.content,n.img,n.created_at,n.updated_at,c.category FROM news as n INNER JOIN categories as c ON n.category = c.id WHERE n.published = ? AND n.category = ? ORDER BY n.id DESC limit $pagestarts,$limit
        ");
            $query->execute([1,$category]);
        }
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

    public function countForAPI($category = null){
        $model = array();
        if ($category == null)
        {
            $query = $this->db->prepare("SELECT n.id,n.title,n.content,n.img,n.created_at,n.updated_at,c.category FROM news as n INNER JOIN categories as c ON n.category = c.id WHERE n.published = ?
        ");
            $query->execute([1]);
        }
        else
        {
            $query = $this->db->prepare("SELECT n.id,n.title,n.content,n.img,n.created_at,n.updated_at,c.category FROM news as n INNER JOIN categories as c ON n.category = c.id WHERE n.published = ? AND n.category = ? 
        ");
            $query->execute([1,$category]);
        }
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

    public function selectByIDForAPI($id){
        $query = $this->db->prepare("SELECT n.id,n.title,n.content,n.img,n.created_at,n.updated_at,c.category FROM news as n INNER JOIN categories as c ON n.category = c.id WHERE n.published = ? AND n.id = ?");
        $query->execute([1,$_GET["id"]]);
        $row = $query->fetch();
        if ($row == false)
        {
            return false;
        }
        $tempNew = new News();
        $tempNew->setId($row["id"]);
        $tempNew->setTitle($row["title"]);
        $tempNew->setContent($row["content"]);
        $tempNew->setCategory($row["category"]);
        $tempNew->setImg($row["img"]);
        $tempNew->setCreatedAt($row["created_at"]);
        $tempNew->setUpdatedAt($row["updated_at"]);
        return $tempNew;
    }
}