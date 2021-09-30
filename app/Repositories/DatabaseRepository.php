<?php

namespace Project\Repositories;

interface DatabaseRepository{
    public function create(array $data);
    public function update();
    public function delete();
    public function select();
}