<?php

namespace Project\Repositories;

use Project\Database\Database as Database;
use Project\Models\Category as Category;

class CategoryRepository{
    private $db;
    public function __construct()
    {
        $db = new Database();
        $this->db = $db->getDb();
    }

    public function create(Category $category){
        $query = $this->db->prepare("INSERT INTO categories 
        (category, created_at, updated_at)
        VALUES (?,?,?)");

        $insert = $query->execute(array(
            $category->getCategory(), $category->getCreatedAt(), $category->getUpdatedAt()
        ));
        if ($insert)
        {
            $last_id = $this->db->lastInsertId();
            return array(1,"Kategori başarı ile eklendi.");
        }
        return array(0,"Kategori eklerken bir hata oluştu.");

    }
    public function update(Category $category){
        $sql = "UPDATE categories SET category=?, created_at=?, updated_at=? WHERE id=?";
        $stmt= $this->db->prepare($sql);
        $result = $stmt->execute([$category->getCategory(), $category->getCreatedAt(), $category->getUpdatedAt(), $category->getId()]);
        if ($result) 
        {
            return array(1,"Kategori başarı ile güncellendi.");
        }
        return array(0,"Kategori güncellenirken bir hata oluştu.");
        
    }
    public function delete($id){
        $isExist = $this->selectById($id);
        if ($isExist)
        {  
            $data = null;
            $sql = "DELETE FROM categories WHERE id=?";
            $stmt= $this->db->prepare($sql);
            $data = $stmt->execute([$id]);
            return $data;
        }
        return false;
    }
    public function select(){
        $model = array();
        $query = $this->db->query("SELECT * FROM categories");
        while ($row = $query->fetch()) {
            $tempNew = new Category();
            $tempNew->setId($row["id"]);
            $tempNew->setCategory($row["category"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $model[] = $tempNew;
        }

        return $model;
    }
    public function selectById($id){
        $data = null;
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id=?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(); 
        if ($data == false)
        {
            return false;
        }
        $news = new Category();
        $news->setId($data["id"]);
        $news->setCategory($data["category"]);
        $news->setCreatedAt($data["created_at"]);
        $news->setUpdatedAt($data["updated_at"]);
        return $news;
    }
    public function selectAllWithLimit($pagesStarts, $limit){
        $model = array();
        $query = $this->db->query("SELECT * FROM categories order by id desc limit $pagesStarts, $limit");
        while ($row = $query->fetch()) {
            $tempNew = new Category();
            $tempNew->setId($row["id"]);
            $tempNew->setCategory($row["category"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $model[] = $tempNew;
        }

        return $model;
    }
}