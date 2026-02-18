<?php
namespace App\Services\ObserverPattern\Main;

use App\Services\ObserverPattern\Interface\Observer;

class Sms implements Observer{
public function update($data){
        echo "Personal Message has sent to all<br>";
        echo $data."<br>";
     }

}