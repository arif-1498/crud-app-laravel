<?php

namespace App\Services\FacadePattern;
use App\Services\FacadePattern\FetchUrl;
use App\Services\FacadePattern\Mp3Converter;

class Downloader{

   public $urlFetch;
   public $mp3Converter;


   public function  __construct(FetchUrl $urlFectch, Mp3Converter $mp3Coverter ){
     $this->urlFetch=$urlFectch;
     $this->mp3Converter=$mp3Coverter;
   }


   public function download($url){
       $vidio= $this->urlFetch->getData($url);
        $status= $this->mp3Converter->convertToMp3($vidio);
        echo $status;
        echo "downloaded the vedio <br>";

   }

}