<?php

namespace Project\Services;

use Project\Models\User;
use Project\Repositories\UserRepository;

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
            return $result;
    }
}