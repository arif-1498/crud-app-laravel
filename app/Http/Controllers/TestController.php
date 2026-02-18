<?php

namespace App\Http\Controllers;

use App\facade\SearchManager;
use App\facade\SearchUser;
use App\Models\Post;
use App\Models\User;
use App\Services\FactoryPattern\Classes\CarFactory;
use App\Services\FactoryPattern\Classes\TruckFactory;
use App\Services\ObserverPattern\Main\Email;
use App\Services\ObserverPattern\Main\Sms;
use App\Services\ObserverPattern\Main\Store;
use Illuminate\Http\Request;
use App\Services\SingletonService;
use App\Services\dummy;
use App\Services\FactoryPattern\Vahicle;
use App\Services\FactoryPattern\VahicleFactory;
use App\Services\BuilderPattern\PersonalInfo;
use App\Services\Prototype\Prototype;
use App\Services\FacadePattern\Downloader;
use App\Services\FacadePattern\Mp3Converter;
use App\Services\FacadePattern\FetchUrl;
use Log;



class TestController extends Controller
{
   

 public function test(){

 
  //  $mp3conveter=new Mp3Converter();
  //    $fetchUrl= new FetchUrl();
  //  $downloaderFacad=new Downloader($fetchUrl, $mp3conveter );
  //  dd($downloaderFacad->download("www.songs.coms/hollywoodsongs"));
   
  $sms=new Sms();
  $mail=new Email();
   $store=new Store();

   $store->attach($sms);
   $store->attach($mail);

   $store->notify("new product available in stock");
   $store->notify("khadi lawn is available now!");
   

 }

 public function show(){

 

  try {
       Log::info("Tesing the working of logging ");
        return 'Log written successfully';
    } catch (\Exception $e) {
        return 'Log failed: ' . $e->getMessage();
    }
    
    
    }
    
}
