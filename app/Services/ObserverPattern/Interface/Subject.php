<?php 
namespace App\Services\ObserverPattern\Interface;

interface Subject{

public function attach(Observer $observer);
public function dettach(Observer $observer);
public function notify( String $data);

}