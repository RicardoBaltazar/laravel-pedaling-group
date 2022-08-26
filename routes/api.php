<?php

use App\Http\Controllers\Api\AuthController;
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

Route::namespace ('App\Http\Controllers\Api')->group(function () {
    Route::post('auth/register', 'AuthController@createUser');
    Route::post('auth/login', 'AuthController@loginUser');

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::apiResource('rides', 'RidesController'); //consult list - php artisan route:list
    });
});
