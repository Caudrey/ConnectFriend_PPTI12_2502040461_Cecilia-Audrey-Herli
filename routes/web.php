<?php

use App\Http\Controllers\FriendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUser;
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


Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'home']);

Route::post('/login', [UserController::class, 'storeLogin']);
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'storeRegister']);
Route::post('/payment', [UserController::class, 'payment']);
Route::get('/logout', [UserController::class, 'logout']);

Route::middleware([CheckUser::class])->group(function () {
    Route::put('/top-up', [UserController::class, 'topup']);

    Route::get('/friend', [FriendController::class, 'show']);
    Route::post('/like', [FriendController::class, 'like']);
    Route::get('/buy-avatar', [AvatarController::class, 'show']);
    Route::post('/buy-avatar', [TransactionController::class, 'store']);
});

