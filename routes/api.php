<?php


use App\Http\Controllers\Api\PointController;
use App\Http\Controllers\Api\T_ArchiveController;
use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->group(function() {


// points
// http://127.0.0.1/api/points
Route::get('/points',[PointController::class,'index']);
// http://127.0.0.1/api/point/id
Route::get('/point/{id}',[PointController::class,'show']);
// http://127.0.0.1/api/point/id?..........
Route::put('/point/{id}',[PointController::class,'update']);
// http://127.0.0.1/api/create_point/?....
Route::post('/create_point',[PointController::class,'store']);
// http://127.0.0.1/api/point/id
Route::delete('/point/{id}',[PointController::class,'destroy']);
// archives
// http://127.0.0.1/api/archives
//to get all the archives and the related objects 
Route::get('/archives',[T_ArchiveController::class,'index']);
// http://127.0.0.1/api/archive/id
//to get the archive and the related objects by  his id  
Route::get('/archive/{id}',[T_ArchiveController::class,'show']);
// http://127.0.0.1/api/create_archive/?.....
//to create new archive
Route::post('/create_archive',[T_ArchiveController::class,'store']);
// http://127.0.0.1/api/archive/id?......
//to get the archive by his id and update it 
Route::put('/archive/{id}',[T_ArchiveController::class,'update']);
// http://127.0.0.1/api/archive/id
//to delete the archive 
Route::delete('/archive/{id}',[T_ArchiveController::class,'destroy']);
//User
// http://127.0.0.1/api/users
//to get all the users and the related archives 
Route::get('/users',[UserController::class,'index']);
// http://127.0.0.1/api/user/id
//to get the user and the related archives by his id 
Route::get('/user/{id}',[UserController ::class,'show']);
// http://127.0.0.1/api/create_user/?....
//to to create new user
Route::post('/create_user',[UserController::class,'store']);
// http://127.0.0.1/api/user/id?....
//to get the user by his id and update it 
Route::put('/user/{id}',[UserController::class,'update']);
// http://127.0.0.1/api/user/id
//to delete the user 
Route::delete('/user/{id}',[UserController::class,'destroy']);

});




// http://127.0.0.1/api/generate-token
// to refresh the token fro the user or create new token 
Route::get('/generate-token/{id}', function ($id) {
    $user = User::find($id);
    $user->update(['api_token'=>$user->createToken('token')->plainTextToken]);
    return $user->api_token;
});



