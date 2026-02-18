<?php

namespace App\Services;
use App\Repositories\PostRepository;

class PostService
{
    protected $postRepository;
    public function __construct(){
       $this->postRepository=new PostRepository();
    }

    public function getAllPost(){
        return $this->postRepository->getAllPost();
    }

    public function getPostById( $id){
        return $this->postRepository->getPostById($id);
    }
}
