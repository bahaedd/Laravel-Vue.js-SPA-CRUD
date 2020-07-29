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

Route::get('packages', 'PackageController@index');

Route::group(['prefix' => 'package'], function () {
    Route::post('store', 'PackageController@store');
    Route::get('edit/{id}', 'PackageController@edit');
    Route::post('update/{id}', 'PackageController@update');
    Route::delete('destroy/{id}', 'PackageController@destroy');
});
