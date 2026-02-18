<?php

namespace App\Services\FactoryPattern\Classes;
use App\Services\FactoryPattern\interfaces\Vahicle;
Class Car implements Vahicle{
   
 public function vahicleType(){
    return  "Cars";
 }
 public function design(){
    return "designing Car....";

  }
public function prepare(){
    return "Preparing Car";

}
public function process(){
    return "Processing car";

}
public function product(){

   return "Car product is ready";

}

}