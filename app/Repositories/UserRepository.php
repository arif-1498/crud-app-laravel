<?php

namespace App\Repositories;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{    
    

    public function getAllUser(){
        return User::with('cities', 'image')->get();
    }
    public function getUserById($id){
        return User::find($id);
    }
}
