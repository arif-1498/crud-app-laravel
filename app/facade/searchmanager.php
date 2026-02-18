<?php

namespace App\facade;
use DateTime;
use DB;
use Illuminate\Support\Facades\Facade;


class SearchManager
{

    public function joinNames($namearray)
    {
        return join(",", $namearray);
    }

    public function formatDate($date, $format)
    {
        return date($format, strtotime($date)  );
    }

}