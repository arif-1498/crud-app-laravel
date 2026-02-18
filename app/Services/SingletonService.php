<?php

namespace App\Services;

class SingletonService
{

 
 
private static  $instance=null;
private function __construct(){
    
}
public static function getSingleton(){
     if(self::$instance===null){
         self::$instance=new SingletonService();
     }
     return self::$instance;
     
}

private function __clone(){

}


public function doSomeThing(){
    echo "doing some thing";
}





}


class dummy{

 public  $name= "arif hussain";
 public $profesion="student";

 public function getName(){
    return $this->name;
 }
 


}
