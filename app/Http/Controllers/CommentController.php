<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
       
        Comment::create($request->all());
        return redirect()->back();
        
    }
   
}
