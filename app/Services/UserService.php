<?php

namespace Project\Services;

use Project\Models\User;
use Project\Repositories\UserRepository;
use Project\Helper\Logging;

class UserService{
    public function addToDatabase(){
            $data = new User();
            $data->setName($_POST["name"]);
            $data->setSurname($_POST["surname"]);
            $data->setEmail($_POST["email"]);
            $data->setPassword($_POST["password"]);
            $data->setType($_POST["type"]);
            $data->setCreatedAt(date('d-m-Y-h:i'));
            $data->setUpdatedAt(date('d-m-Y-h:i'));
            $repo = new UserRepository();
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

    public function updateUser(User $user){
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

    public function getUsers(){
        $repo = new UserRepository();
        $data = $repo->select();
        Logging::error("Veritabanından Tüm Kullanıcılar Çekildi");
        return $data;
    }

    public function getUserById(){
        $id = $_GET["id"];
        $repo = new UserRepository();
        $data = $repo->selectById($id);
        Logging::error("Veritabanından $id id'li kullanıcı çekildi");
        return $data;
    }

    public function deleteUserById(){
        $id = $_GET["id"];
        $repo = new UserRepository();
        $data = $repo->delete($id);
        Logging::error("Veritabanından $id id'li kullanıcı silindi");
        return $data;
    }
}