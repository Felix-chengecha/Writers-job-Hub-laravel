<?php

use App\Http\Controllers\IngridientsController;
use App\Http\Controllers\MealsController;
use App\Http\Resources\IngridientResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//return password

Route::get('/lipa/mpesa/pass/,MpesaController@mpesapassword');

//return access token

Route::get('/new/access/token/,MpesaController@newAccessToken');

//iniate stk push

Route::post('/mpesa/stk/push/,MpesaController@stkpush');

//receive callbacks with this route

Route::post('/mpesa/stk/push/callback,MpesaController@stkpushCallback');


Route::get('/recipes,MealsController@index');



Route::group(['prefix'=> 'v1'], function(){
    Route::apiResource('store', MealsController::class);
    Route::apiResource('ingridients',IngridientsController::class);
});
