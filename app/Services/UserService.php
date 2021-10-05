<?php

namespace Project\Services;

use Project\Helper\Authorization;
use Project\Models\User;
use Project\Repositories\UserRepository;
use Project\Helper\Logging;

class UserService{
    public function addToDatabase(){
        if (strlen($_POST["name"]) > 0)
        {
            if (strlen($_POST["surname"]) > 0)
            {
                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
                {
                    if ((strlen($_POST["password"]) > 7) && ($_POST["password"] == $_POST["password2"]))
                    {
                        $data = new User();
                        $data->setName($_POST["name"]);
                        $data->setSurname($_POST["surname"]);
                        $data->setEmail($_POST["email"]);
                        $data->setPassword($_POST["password"]);
                        $data->setType($_POST["type"]);
                        $data->setCreatedAt(date('d-m-Y-h:i'));
                        $data->setUpdatedAt(date('d-m-Y-h:i'));
                        $repo = new UserRepository();
                        if (!$repo->selectByEmail($_POST["email"]))
                        {
                            return array(0,"Bu email adresi sistemde kayıtlı.");
                        }
                        $result = $repo->create($data);
                        if ($result[0] == 1)
                        {
                            Logging::error("Veritabanına ".$data->getId()." id'li yeni bir kullanıcı eklendi ");
                        }
                        else
                        {
                            Logging::error("Veritabanına kullanıcı eklerken bir hata oluştu ");
                        }
                        return $result;
                    }
                    return array(0,"Şifreler eşleşmeli ve en az 8 karakter olmalıdır.");
                }
                return array(0,"Email alanı zorunludur");
            } 
            return array(0,"Soyisim alanı zorunludur.");
        }
        return array(0,"İsim alanı zorunludur.");
    }

    public function updateUser(User $user){
        if (strlen($_POST["name"]) > 0)
        {
            if (strlen($_POST["surname"]) > 0)
            {
                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
                {
                    if (($_POST["password"] == "" && $_POST["password2"] == "") || 
                    (strlen($_POST["password"]) > 7) && ($_POST["password"] == $_POST["password2"]))
                    {
                        $data = new User();
                        $data->setId($user->getId());
                        $data->setName($_POST["name"]);
                        $data->setSurname($_POST["surname"]);
                        $data->setEmail($_POST["email"]);
                        $password = $_POST["password"] == "" ? $user->getPassword() : $_POST["password"];
                        $data->setPassword($password);
                        $data->setType($_POST['type']);
                        $data->setCreatedAt($user->getCreatedAt());
                        $data->setUpdatedAt(date('d-m-Y-h:i'));
                        $repo = new UserRepository();
                        if (!$repo->selectByEmail($_POST["email"]) && $_POST["email"] != $user->getEmail())
                        {
                            return array(0,"Bu email adresi sistemde kayıtlı.");
                        }
                        $result = $repo->update($data);
                        if ($result[0] == 1)
                        {
                            Logging::error("Veritabanında ".$data->getId()." id'li kullanıcı güncellendi ");
                        }
                        else
                        {
                            Logging::error("Veritabanına ".$data->getId()." id'li kullanıcı güncellenirken bir hata oluştu ");
                        }
                        return $result;
                        }
                    return array(0,"Şifreler eşleşmeli ve en az 8 karakter olmalıdır.");
                }
                return array(0,"Email alanı zorunludur");
            } 
            return array(0,"Soyisim alanı zorunludur.");
        }
        return array(0,"İsim alanı zorunludur.");
    }

    public function getUsers(){
        $repo = new UserRepository();
        //Moderatör için
        if (Authorization::isModerator())
        {
            $data = $repo->getCountForModerator();
            Logging::info("Veritabanından Kullanıcılar Sayfası İçin Kullanıcılar Çekildi");
            return $data;
        }
        //Admin için
        $data = $repo->select();
        Logging::info("Veritabanından Kullanıcılar Sayfası İçin Kullanıcılar Çekildi");
        return $data;
    }

    public function getUserById(){
        $id = $_GET["id"];
        $repo = new UserRepository();
        $data = $repo->selectById($id);
        if ($data == false)
        {
            Logging::emergency($id." id'li kullanıcı veritabanından çekilemedi.");
            return false;
        }
        Logging::info($id." id'li kullanıcı veritabanından çekildi.");
        return $data;
    }

    public function deleteUserById(){
        $id = $_GET["id"];
        $repo = new UserRepository();
        $data = $repo->delete($id);
        if ($data == false)
        {
            Logging::emergency($id." id'li kullanıcı veritabanından silinemedi.");
            return false;
        }
        Logging::info($id." id'li kullanıcı veritabanından silindi.");
        return $data;
    }

    public function getPaginatedUsers($page){
        if (empty($page) || !is_numeric($page))
        {
            $page = 1;
        }
        $limit = 5;
        $repo = new UserRepository();
        $pageStarts = ($page*$limit) - $limit;
        //Moderatör İçin
        if (Authorization::isModerator())
        {
            $data = $repo->getAllForModerator($pageStarts, $limit);
            Logging::info("Veritabanından Kullanıcılar Sayfası İçin Kullanıcılar Çekildi");
            return $data;
        }
        //Admin için
            $data = $repo->selectAllWithLimit($pageStarts, $limit);
            Logging::info("Veritabanından Kullanıcılar Sayfası İçin Kullanıcılar Çekildi");
        return $data;
    }
}