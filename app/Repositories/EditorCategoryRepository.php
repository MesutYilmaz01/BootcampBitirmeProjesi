<?php

namespace Project\Repositories;

use Project\Database\Database as Database;
use Project\Models\Category;
use Project\Models\User;

class EditorCategoryRepository{
    private $db;
    public function __construct()
    {
        $db = new Database();
        $this->db = $db->getDb();
    }
    public function create($user_id, $category_id){
        $query = $this->db->prepare("INSERT INTO editor_categories 
        (editor_id, category_id, created_at, updated_at)
        VALUES (?,?,?,?)");

        $insert = $query->execute(array(
            $user_id, $category_id, Date('d-m-Y:i'), Date('d-m-Y:i')
        ));
        if ($insert)
        {
            $last_id = $this->db->lastInsertId();
            return array(1,"Kategori editöre başarı ile eklendi.");
        }
        return array(0,"Kategori editöre eklenirken bir hata oluştu.");
    }

    public function getAllById(User $user){
        $query = $this->db->prepare("SELECT ct.* FROM editor_categories as ec
            LEFT JOIN categories as ct ON ec.category_id = ct.id WHERE ec.editor_id = ?;");
        $query->execute([$user->getId()]);
        while ($row = $query->fetch()) {
            $temp = new Category();
            $temp->setId($row["id"]);
            $temp->setCategory($row["category"]);
            $user->setCategories($temp);
        }
        return $user;
    }

    public function deleteEditorCategoryById($editor_id, $category_id){
        $isExist = $this->selectById($editor_id, $category_id);
        if ($isExist)
        {
            $data = null;
            $sql = "DELETE FROM editor_categories WHERE category_id=? AND editor_id=?";
            $stmt= $this->db->prepare($sql);

            $data = $stmt->execute([$category_id, $editor_id]);
            return $data;
        }
        return false;
    }

    public function selectById($editor_id, $category_id){
        $data = null;
        $stmt = $this->db->prepare("SELECT * FROM editor_categories WHERE category_id=? AND editor_id=?");
        $stmt->execute([$category_id, $editor_id]);
        $data = $stmt->fetch();
        if ($data == false)
        {
            return false;
        }
        return true;
    }

    public function updateTime($time){
        $sql = "UPDATE editor_update_time SET time=? WHERE id=?";
        $stmt= $this->db->prepare($sql);
        $result = $stmt->execute([$time, 1]);
        if ($result) 
        {
            return array(1,"Editör düzenleme zamanı başarı ile güncellendi.");
        }
        return array(0,"Editör düzenleme zamanı güncellenirken bir hata oluştu.");
    }

    public function getEditorUpdateTime(){
        $data = null;
        $stmt = $this->db->prepare("SELECT * FROM editor_update_time WHERE id=?");
        $stmt->execute([1]);
        $data = $stmt->fetch();
        if ($data == false)
        {
            return false;
        }
        return $data;
    }
}