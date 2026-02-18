<?php

namespace App\Repositories;
use App\Repositories\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface
{
    protected $post;
    public function __construct()
    {
        $this->post=new Post();
    }

    public function getAllPost(): array|Collection {
        return $this->post->latest()->with(['user', 'comments','image'])->where('title','like','%'.request('search').'%')->get();
    }
    public function getPostById($id){
          return $this->post->find($id);
    }


}
