<?php

namespace App\Services\FactoryPattern\Classes;
use App\Services\FactoryPattern\interfaces\Vahicle;

class Truck implements Vahicle{
  public function design(){
    return "designing Truck....";

  }
public function prepare(){
    return "Preparing Truck";

}
public function process(){
    return "Processing Truck";

}
public function product(){

   return "Car product is Truck";

}
}