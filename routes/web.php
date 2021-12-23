<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/',               'App\Http\Controllers\SearchController@index');

Route::get('/search',         'App\Http\Controllers\SearchController@search');

Route::get('/detail/{id}',    'App\Http\Controllers\SearchController@detail');

Route::post('/edit',          'App\Http\Controllers\SearchController@edit');

Route::post('/logedit',       'App\Http\Controllers\SearchController@logedit');

Route::post('/exlogedit',     'App\Http\Controllers\SearchController@exlogedit');

Route::get('/input',          'App\Http\Controllers\RegistrationController@input');

Route::post('/import',        'App\Http\Controllers\RegistrationController@import');

Route::post('/create',        'App\Http\Controllers\RegistrationController@create');

Route::post('/createlog',     'App\Http\Controllers\RegistrationController@createlog');