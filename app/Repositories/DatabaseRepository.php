<?php

namespace Project\Repositories;

interface DatabaseRepository{
    public function create();
    public function update();
    public function delete();
    public function select();
}