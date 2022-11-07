<?php

namespace App\Repositories;

interface PostInterface 
{
    public function getPostById($id);
    public function createPost($request);
    public function getPostByPagination($request);
    
}