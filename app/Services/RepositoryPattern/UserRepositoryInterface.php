<?php


namespace App\Services\RepositoryPattern;

interface UserRepositoryInterface{

   public function getUser();
   public function addUser();
   public function updateUser();
   public function deleteUser();
}