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
Route::get('/todo', 'GoalController@index');
Route::get('/todo/{id}', 'GoalController@show');
Route::post('/todo', 'GoalController@store');
Route::delete('/todo/{id}', 'GoalController@delete');
Route::post('/todo/{id}/edit', 'GoalController@editTask');
Route::post('/todo/{id}/editStatus', 'GoalController@editStatus');