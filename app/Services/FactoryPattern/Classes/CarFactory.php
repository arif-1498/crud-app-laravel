<?php

namespace App\Services\FactoryPattern\Classes;
use App\Services\FactoryPattern\interfaces\VahicleFactory;

class CarFactory implements VahicleFactory{
     public static  function manufactor(){
        return new Car();
     }
}