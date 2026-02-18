<?php

namespace App\Services\RepositoryPattern;

class UserRespository implements UserRepositoryInterface{
    public function getUser(){
       echo "geting all user from db";
    }
   public function addUser(){
       echo "inserting a user in to db";


   }
   public function updateUser(){
    echo "updating user.........";
   }
   public function deleteUser(){

   echo "deleting User...........";

   }
}