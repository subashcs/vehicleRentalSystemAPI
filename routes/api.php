<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('vehicle','Vehicle\VehicleController@vehicle');
// Route::get('vehicle/{id}','Vehicle\VehicleController@vehicleByID');

// Route::post('vehicle','Vehicle\VehicleController@vehicleAdd');
// Route::put('vehicle/{id}','Vehicle\VehicleController@vehicleUpdate');
// Route::delete('vehicle/{id}','Vehicle\VehicleController@vehicleDelete');

Route::apiResource('vehicle','Vehicle\Vehicle');