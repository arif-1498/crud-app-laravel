<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;
use App\Services\UserService;
use App\Services\FileUploadService;

class UserController extends Controller
{
     protected $userService;
     protected $uploadFileService;

     public function __construct(UserService $userService, FileUploadService $fileUploadService){
         $this->userService=$userService;
         $this->uploadFileService=$fileUploadService;
     }
    
    public function index( ){
        $users=$this->userService->getAllUser();
       
         return view("post.all_users",compact("users"));
    }
    
    public function edit($id){
        $users=$this->userService->getUserById($id);
        $cities=City::all();
        return view("user.complete_profile",compact("users","cities"));
    }
    public function update(UpdateUserRequest $request, $id){
        $user= $this->userService->getUserById($id);
        $imageNewName=$this->uploadFileService->uploadFile($request, 'image', 'profile_images');
        $user->update($request->all());
        $user->cities()->sync($request->cities?:[]);
        $user->image()->create(['name'=>$imageNewName]);
        return redirect()->route('dashboard')->with('success', 'Data successfully updated')->withInput();
    }   

    public function destroy( $id){
        $user= $this->userService->getUserById($id);
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'Data successfully deleted');
    }

}