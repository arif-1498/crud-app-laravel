<?php

namespace App\facade;
use App\Models\User;
use Illuminate\Support\Facades\Facade;
class SearchUser extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'SearchUser';
    }
}

