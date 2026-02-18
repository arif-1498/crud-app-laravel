<?php

namespace App\Services\ObserverPattern\Main;

use App\Services\ObserverPattern\Interface\Observer;

class Email implements Observer{
     public function update($data){
        echo "Email has sent to all for<br>";
        echo $data."<br>";
     }
}