<?php

namespace App\Services\BuilderPattern;

interface Builder{
    
   public function name(string $name);
   public function role(string $role);
   public function education(string $education);
   public function interests(string $interests);
   public function getInfo();

}