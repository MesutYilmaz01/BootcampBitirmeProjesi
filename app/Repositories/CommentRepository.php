<?php

namespace Project\Repositories;

use Project\Database\Database as Database;
use Project\Models\Comment as Comment;

class CommentRepository{
    private $db;
    public function __construct()
    {
        $db = new Database();
        $this->db = $db->getDb();
    }

    public function create(Comment $comment){
        $query = $this->db->prepare("INSERT INTO comments 
        (user_id, new_id, comment, approve, created_at, updated_at)
        VALUES (?,?,?,?,?,?)");

        $insert = $query->execute(array(
            $comment->getUserId(), $comment->getNewId(), $comment->getComment(),
            $comment->getApprove(), $comment->getCreatedAt(), $comment->getUpdatedAt()
        ));
        if ($insert)
        {
            $last_id = $this->db->lastInsertId();
            return array(1,"Yorum başarı ile eklendi.");
        }
        return array(0,"Yorum eklerken bir hata oluştu.");

    }

    public function update($comment_id, $approve){
        $sql = "UPDATE comments SET approve = ? updated_at=? WHERE id=?";
        $stmt= $this->db->prepare($sql);
        $result = $stmt->execute([$approve, $comment_id]);
        if ($result) 
        {
            return array(1,"Yorum başarı ile güncellendi.");
        }
        return array(0,"Yorum güncellenirken bir hata oluştu.");
    
}

    public function delete($id){
        $isExist = $this->selectById($id);
        if ($isExist)
        {  
            $data = null;
            $sql = "DELETE FROM comments WHERE id=?";
            $stmt= $this->db->prepare($sql);
            $data = $stmt->execute([$id]);
            return $data;
        }
        return false;
    }
    public function select(){
        $model = array();
        $query = $this->db->query("SELECT * FROM comments");
        while ($row = $query->fetch()) {
            $tempNew = new Comment();
            $tempNew->setId($row["id"]);
            $tempNew->setUserId($row["user_id"]);
            $tempNew->setNewId($row["new_id"]);
            $tempNew->setComment($row["comment"]);
            $tempNew->setApprove($row["approve"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $model[] = $tempNew;
        }

        return $model;
    }
    public function selectByUserId($id){
        $model = array();
        $query = $this->db->prepare("SELECT * FROM comments WHERE user_id=?");
        $query->execute([$id]);
        while ($row = $query->fetch()) {
            $tempNew = new Comment();
            $tempNew->setId($row["id"]);
            $tempNew->setUserId($row["user_id"]);
            $tempNew->setNewId($row["new_id"]);
            $tempNew->setComment($row["comment"]);
            $tempNew->setApprove($row["approve"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $model[] = $tempNew;
        }
        return $model;
    }

    public function selectforNew($new_id){
        $model = array();
        $query = $this->db->prepare("SELECT u.name, u.surname ,c.* FROM comments as c INNER JOIN users as u ON c.user_id = u.id WHERE new_id=? AND approve=?");
        $query->execute([$new_id,1]);
        while ($row = $query->fetch()) {
            $tempNew = new Comment();
            $tempNew->setId($row["id"]);
            $tempNew->setUserId($row["name"]);
            $tempNew->setNewId($row["surname"]);
            $tempNew->setComment($row["comment"]);
            $tempNew->setApprove($row["approve"]);
            $tempNew->setCreatedAt($row["created_at"]);
            $tempNew->setUpdatedAt($row["updated_at"]);
            $model[] = $tempNew;
        }
        return $model;
    }

}