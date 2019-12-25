<?php

use Illuminate\Http\Request;

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


Route::post('/login', 'Auth\Api\AuthController@login')->name('login');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::group(['middleware' => 'auth:api'], function() {

    Route::get('user', function(Request $request) {
        return response()->json(['user' => auth()->user()]);
    });

});


