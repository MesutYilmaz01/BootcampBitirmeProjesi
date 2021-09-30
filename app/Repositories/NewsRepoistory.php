<?php

namespace Project\Repositories;

use Project\Models\News as News;
use Project\Database\Database as Database;

class NewsRepository implements DatabaseRepository{
    private $db;
    public function __construct()
    {   
        $db = new Database();
        $this->db = $db->getDb();
    }
    public function create(array $data){
        $query = $this->db->prepare("INSERT INTO news SET
            title = ?,
            content = ?,
            category = ?,
            img = ?");
        $insert = $query->execute(array(
            $data["title"], $data["content"], $data["category"], $data["img"]
        ));
        if ($insert)
        {
            $last_id = $this->db->lastInsertId();
            return true;
        }
        return false;
        
    }
    public function update(){

    }
    public function delete(){

    }
    public function select(){
        
    }

}