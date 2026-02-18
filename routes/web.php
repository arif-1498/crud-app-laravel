<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAuth\FacebookAuthController;
use App\Http\Controllers\SocialAuth\GoogleAuthController;
use App\Http\Controllers\SocialAuth\LinkedInAuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Users\UserPostController;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/testing', [TestController::class, 'test']);

 Route::get('/testingRoutes', [TestController::class, 'show']);   
Route::get('/dashboard', [PostController::class, 'index'])
    ->middleware(['auth:sanctum', 'verified'])
    ->name('dashboard');
Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}/delete', [UserController::class, 'destroy'])->name('user.delete');
    Route::resource('post', PostController::class);
    Route::get('/user/post', [UserPostController::class,'userPosts'])->name('user.posts');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
