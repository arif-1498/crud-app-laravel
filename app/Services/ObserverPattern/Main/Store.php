<?php 

namespace App\Services\ObserverPattern\Main;

use App\Services\ObserverPattern\Interface\Subject;
use App\Services\ObserverPattern\Interface\Observer;

class Store implements Subject{

 private $observer=[];
public function attach(Observer $observer){
   $this->observer[]=$observer;
}
public function dettach(Observer $observer){

 foreach($this->observer as $obs){
    if($obs===$observer){
        unset($observer);
    }

 }

}
public function notify( String $data){
    foreach($this->observer as $obs){
        $obs->update($data);
    }
    
}

}