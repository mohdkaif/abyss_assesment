<?php

namespace App\Repositories;

interface PostInterface 
{
    public function getPostById($id);
    public function createPost($request);
    // public function getPostListAll();
    // public function getPostListPagination();
    // public function deletePosts();
    // public function addPosts();
    
}