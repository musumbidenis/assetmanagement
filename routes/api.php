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

Route::post('/register', 'UsersController@register');
Route::post('/login', 'UsersController@login');

Route::post('/start', 'SessionsController@start');
Route::post('/stop', 'SessionsController@stop');

Route::get('/getLabs', 'SessionsController@labs');
