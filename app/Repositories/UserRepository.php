<?php

namespace Project\Repositories;

use Project\Models\User as User;

class UserRepository implements DatabaseRepository{
    public function __construct(User $user)
    {
        echo 'userrepo';   
    }
    public function create(){
    }
    public function update(){

    }
    public function delete(){

    }
    public function select(){
        
    }

}