<?php

namespace App\Services;
use App\Repositories\UserRepository;

class UserService
{
   public $userRepository;
    public function __construct(){
          $this->userRepository=new UserRepository();
    }
    
    public function getAllUser(){
      return  $this->userRepository->getAllUser();
    }

    public function getUserById($id){
        return $this->userRepository->getUserById($id);
    }

}
