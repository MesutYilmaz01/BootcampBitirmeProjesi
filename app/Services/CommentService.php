<?php

namespace Project\Services;

use Project\Helper\Authentication;
use Project\Helper\Authorization;
use Project\Models\User;
use Project\Models\Comment as Comment;
use Project\Services\UserService;
use Project\Repositories\CommentRepository as CommentRepository;
use Project\Helper\Logging;

class CommentService{
    public function create($user_id, $new_id, $com){
        $repo = new CommentRepository();
        $comment = new Comment();
        $comment->setUserId($user_id);
        $comment->setNewId($new_id);
        $comment->setComment($com);
        $comment->setApprove("0");
        $comment->setCreatedAt(date("d-m-Y h:i"));
        $comment->setUpdatedAt(date("d-m-Y h:i"));
        $result = $repo->create($comment);
        $temp = new User();
        if($user_id == 0){
            $temp->setId("0");
            $temp->setName("Anonim");
            $temp->setSurname("Kullanıcı");
        }
        if ($result[0] == 1)
        {
            if ($user_id == 0)
            {
                Logging::info($temp,"Yorum başarı ile eklendi.");                
            }
            else
            {
                Logging::info(Authentication::getUser(),"Yorum başarı ile eklendi.");
            }
            return true;
        }
        if ($user_id == 0)
        {
            Logging::critical(Authentication::getUser(),"Yorum eklenirken bir sorun oluştu");
        }
        else
        {
            Logging::critical(Authentication::getUser(),"Yorum eklenirken bir sorun oluştu");
        }
        return false;
    }

    public function selectForNews(){
        $id = $_POST["id"];
        $temp = new User();
        $temp->setName("Bir");
        $temp->setSurname("Kullanıcı");
        $temp->getType("4");
        $repo = new CommentRepository();
        $result = $repo->selectforNew($id);
        Logging::critical($temp,"Yorumlar başarılı bir şekilde çekildi.");
        return $result;
    }

    public function selectCommentHistory(){
        $token = $_GET["token"];
        $service = new UserService();
        $repo = new CommentRepository();
        $user = $service->getUserByToken($token);
        if ($user)
        {
            $result = $repo->selectByUserId($user->getId());
            if ($result == false){
                Logging::emergency($user,"Yorumlar çekilemedi");
                return false;
            }
            Logging::info($user,"Yorumlar başarıyla çekildi");
            return $result;
        }
    }

    public function paginatedComments($pagenumber){
        $repo = new CommentRepository();
        $limit = 20;
        $pagenumber = ($pagenumber*$limit) - $limit;
        $result = $repo->selectPagination($pagenumber,$limit);
        if($result == false)
        {
            Logging::critical(Authentication::getUser(),"Bütün yorumlar çekilirken hata oluştu");
            return false;
        }
        Logging::info(Authentication::getUser(),"Bütün yorumlar çekildi");
        return $result;
    }

    public function selectAll(){
        $repo = new CommentRepository();
        $result = $repo->select();
        if($result == false)
        {
            Logging::critical(Authentication::getUser(),"Yorum sayısı alınırken hata oluştu");
            return false;
        }
        Logging::info(Authentication::getUser(),"Yorum sayısı alındı");
        return $result;
    }

    public function deleteComment(){
        if (isset($_GET["id"]))
        {
            $id = $_GET["id"];
            $repo = new CommentRepository();
            $result = $repo->delete($id);
            if ($result == false)
            {
                Logging::critical(Authentication::getUser(), "Yorum silinirken bir hata oluştu");
                return false;
            }
            Logging::info(Authentication::getUser(), "Yorum başarıyla silindi");
            return $result;

        }
        return false;
    }

    public function approveComment(){
        $repo = new CommentRepository();
        if (isset($_GET["id"]))
        {
            if(isset($_GET["app"]))
            {
                $id = $_GET["id"];
                $app = $_GET["app"];
                $approve = "";
                if ($app == 0)
                {
                    $approve = 1;
                }
                if ($app == 1)
                {
                    $approve = 0;
                }
                $result = $repo->update($id,$approve);
                if ($result == false)
                {
                    Logging::critical(Authentication::getUser(),"Yorum onaylanırken bir sorun oluştu");
                    return false;
                }
                Logging::info(Authentication::getUser(),"Yorum başarıyla onaylandı");
                return $result;

            }
            return false;
        }
        return false;
    }
}