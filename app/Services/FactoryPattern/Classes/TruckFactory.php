<?php

namespace App\Services\FactoryPattern\Classes;
use App\Services\FactoryPattern\interfaces\VahicleFactory;
use App\Services\FactoryPattern\Classes\Truck;

class TruckFactory implements VahicleFactory{
     public static function manufactor(){
        return new Truck();
     }
}

