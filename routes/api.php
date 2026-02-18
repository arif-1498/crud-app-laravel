<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/appusers', function (){
  $users=User::all();
  return response()->json(['success' =>true,'data' => $users]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return response($request->user());
  return $request->user();
});

