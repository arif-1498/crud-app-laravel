<?php
namespace App\Services\AdapterPattern;
use App\Services\AdapterPattern\PlugInterface;

class PlugAdapter implements PlugInterface{

private $device;
 public function __construct(Device $device){
     $this->device=$device;
 }

 public function PlugedIn(){
    return $this->device->connected();
}
}