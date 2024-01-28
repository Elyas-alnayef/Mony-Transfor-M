<?php
use App\Http\Controllers\PointController;
use App\Http\Controllers\T_ArchiveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

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




Route::get('/', [PointController::class,'index']
)->name('home');
Route::get('/exchange', function(){
    return view ('exchange');
})->name('exchange');
route::resource('points',PointController::class);  
route::resource('archive',T_ArchiveController::class);
route::resource('users',UserController::class);


Route::get('/register',function (){
    return view('auth.register');
})->name('registerget');

Route::post('/registeruser', [AuthController::class,'registeruser'])->name('register');

Route::post('/logout',[AuthController::class,'logout']
)->name('logout');

Route::get('/login',function (){
    return view('auth.login');
})->name('login');

Route::post('/login_p', [AuthController::class,'login'])->name('login_p');

 






