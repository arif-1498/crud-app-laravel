<?php

namespace App\Http\Controllers;
use App;
use App\facade\SearchUser;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comments;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Service\UserService;
use App\Services\PostService;
use App\Services\FileUploadService;

class PostController extends Controller
{
   protected $fileUploadService;
   public function __construct(FileUploadService $fileUploadService)
   {
       $this->fileUploadService=$fileUploadService;
   }

    public function index(PostService $post)
    {  
        
        $posts=$post->getAllPost();
         return view("post.index", compact('posts'));
    }
    public function create()
    {
        return view("post.create");
    }
    public function store(StorePostRequest $request)
    {
        $validatedData = $request->safe()->except('image');
        $imageUniqueName=$this->fileUploadService->uploadFile($request, 'image', 'post_images');
        $post = Post::create($validatedData);
        $post->image()->create(['name'=>$imageUniqueName]);
        if($post){
            return redirect()->route("post.index")->with('success', 'Post created successfully.');
        }
        else{
        return redirect()->back()->with('error','Failed to create post.')->withInput();
        }
    }
 
   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
