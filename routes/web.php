<?php

use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    $tasks = DB::select('select * from tasks');
    return view('welcome', ['tasks' => $tasks]);
})->name('home');

Route::get('/register', 'RegistrationController@create')->name('register');
Route::post('register', 'Auth\RegisterController@register');
 
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/addJob', 'JobController@create');
Route::post('/addJob', 'JobController@store');
