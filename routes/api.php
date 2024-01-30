<?php


use App\Http\Controllers\Api\PointController;
use App\Http\Controllers\Api\T_ArchiveController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// points
Route::get('/points',[PointController::class,'index']);
Route::get('/point/{id}',[PointController::class,'show']);
Route::put('/point/{id}',[PointController::class,'update']);
Route::post('/create_point',[PointController::class,'store']);
Route::delete('/point/{id}',[PointController::class,'destroy']);
// archives
Route::get('/archives',[T_ArchiveController::class,'index']);
Route::get('/archive/{id}',[T_ArchiveController::class,'show']);
Route::post('/create_archive',[T_ArchiveController::class,'store']);
Route::put('/archive/{id}',[T_ArchiveController::class,'update']);
Route::delete('/archive/{id}',[T_ArchiveController::class,'destroy']);



