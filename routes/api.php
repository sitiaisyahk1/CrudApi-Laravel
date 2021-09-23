<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;

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

// Route::post('/biodata', [BiodataController::class, 'store']);
Route::apiResource('/biodata', "BiodataController");
// Route::post('/biodata', "App\Http\Controllers\BiodataController@store");
// Route::get('/biodata', "API\V1\BiodataController@index");
// Route::get('/biodata/{id}', "API\V1\BiodataController@show");
// Route::put('/biodata/{id}', "API\V1\BiodataController@update");
// Route::delete('/biodata/{id}', "API\V1\BiodataController@destroy");

