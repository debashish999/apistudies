<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyapi;

use App\Http\Controllers\DeviceController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/data",[dummyapi::class,'getdata']);

// Route::get("/list",[DeviceController::class,'list']);

Route::get("/listall/{id?}",[DeviceController::class,'listall']);

// Route::get("/list/{id}",[DeviceController::class,'listParam']);

Route::post("/add",[DeviceController::class,'add']);

Route::put('/update',[DeviceController::class,'update']);

Route::get('/search/{name}',[DeviceController::class,'search']);

Route::delete('/delete/{id}',[DeviceController::class,'delete']);

Route::post('/save',[DeviceController::class,'testData']);
