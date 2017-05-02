<?php

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
    if(Auth::check()) {
        return redirect('/home');
    } else {
        return view('auth.login');
    }
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

	Route::get('/home', [ 'as' => 'home', 'uses' => 'HomeController@index']);

	Route::group(['middleware' => ['isAdmin']], function(){

		Route::group(['prefix' => 'users'], function () {
		    Route::resource('', 'UserController');
		});

		Route::group(['prefix' => 'roles'], function () {
		    Route::resource('', 'RoleController');
		    Route::resource('store', 'RoleController@store');
		});

	});

});