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
    // return Auth::check()? redirect('/home') : redirect('auth.login');
    return Auth::check()? redirect('/home') : redirect('login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

	Route::get('/home', [ 'as' => 'home', 'uses' => 'HomeController@index']);

	Route::group(['middleware' => ['isAdmin']], function(){

		Route::group(['prefix' => 'users'], function () {
		    Route::resource('', 'UserController');
		    Route::post('store', 'UserController@store');
		});

		Route::group(['prefix' => 'roles'], function () {
		    Route::resource('', 'RoleController');
		    Route::get('getDatas', 'RoleController@getAllRoles');
		    Route::get('getData/{id}', 'RoleController@getOneRole');
		    Route::put('putData/{id}', 'RoleController@updateRole');
		    Route::get('delData/{id}', 'RoleController@deleteRole');
		    Route::post('store', 'RoleController@postStoreRole');
		});

	});

});