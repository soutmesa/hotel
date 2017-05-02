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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function() {
	Route::get('/home',
	[
		'as'=>'home',
		'uses'=>'HomeController@index'
	]);
	Route::group(['middleware'=>['isAdmin']], function(){
		Route::resource('users', 'UserController');
		// Route::resource('/users/create', 'UserController@create');
		// Route::resource('/users/store', 'UserController@store');
		// Route::resource('/users/edit', 'UserController@edit');
		// Route::resource('/users/update', 'UserController@update');
		// Route::resource('/users/show', 'UserController@show');
		// Route::resource('/users/delete', 'UserController@destroy');
	});
	
	Route::get('/roles',
	[
		'as'=>'roles.index',
		'uses'=>'RoleController@index',
		'middleware' => ['permission:role-list|role-create|role-edit|role-delete']
	]);
	Route::get('/roles/create',
	[
		'as'=>'roles.create',
		'uses'=>'RoleController@create',
		'middleware' => ['permission:role-create']
	]);
	Route::post('/roles/store',
	[
		'as'=>'roles.store',
		'uses'=>'RoleController@store',
		'middleware' => ['permission:role-create']
	]);
	Route::get('/roles/show',
	[
		'as'=>'roles.show',
		'uses'=>'RoleController@show'
	]);
	Route::get('/roles/edit/{id}',
	[
		'as'=>'roles.edit',
		'uses'=>'RoleController@edit',
		'middleware' => ['permission:role-edit']
	]);
	Route::patch('/roles/update/{id}',
	[
		'as'=>'roles.update',
		'uses'=>'RoleController@update',
		'middleware' => ['permission:role-edit']
	]);
	Route::get('/roles/delete/{id}',
	[
		'as'=>'roles.delete',
		'uses'=>'RoleController@destroy',
		'middleware' => ['permission:role-delete']
	]);
	Route::get('/permissions',
	[
		'as'=>'permissions.index',
		'uses'=>'PermissionController@index',
		'middleware' => ['permission:permi-list|permi-create|permi-edit|permi-delete']
	]);
	Route::get('/permissions/create',
	[
		'as'=>'permissions.create',
		'uses'=>'PermissionController@create',
		'middleware' => ['permission:permi-create']
	]);
	Route::post('/permissions/store',
	[
		'as'=>'permissions.store',
		'uses'=>'PermissionController@store',
		'middleware' => ['permission:permi-create']
	]);
	Route::get('/permissions/show',
	[
		'as'=>'permissions.show',
		'uses'=>'PermissionController@show'
	]);
	Route::get('/permissions/edit/{id}',
	[
		'as'=>'permissions.edit',
		'uses'=>'PermissionController@edit',
		'middleware' => ['permission:permi-edit']
	]);
	Route::patch('/permissions/update/{id}',
	[
		'as'=>'permissions.update',
		'uses'=>'PermissionController@update',
		'middleware' => ['permission:permi-edit']
	]);
	Route::get('/permissions/delete/{id}',
	[
		'as'=>'permissions.delete',
		'uses'=>'PermissionController@destroy',
		'middleware' => ['permission:permi-delete']
	]);
	Route::get('/posts',
	[
		'as'=>'posts.index',
		'uses'=>'PostController@index',
		'middleware' => ['permission:pos-list|pos-create|pos-edit|pos-delete']
	]);
	Route::get('/posts/create',
	[
		'as'=>'posts.create',
		'uses'=>'PostController@create',
		'middleware' => ['permission:pos-create']
	]);
	Route::post('/posts/store',
	[
		'as'=>'posts.store',
		'uses'=>'PostController@store',
		'middleware' => ['permission:pos-create']
	]);
	Route::get('/posts/show',
	[
		'as'=>'posts.show',
		'uses'=>'PostController@show'
	]);
	Route::get('/posts/edit/{id}',
	[
		'as'=>'posts.edit',
		'uses'=>'PostController@edit',
		'middleware' => ['permission:pos-edit']
	]);
	Route::patch('/posts/update/{id}',
	[
		'as'=>'posts.update',
		'uses'=>'PostController@update',
		'middleware' => ['permission:pos-edit']
	]);
	Route::get('/posts/delete/{id}',
	[
		'as'=>'posts.destroy',
		'uses'=>'PostController@destroy',
		'middleware' => ['permission:pos-delete']
	]);
	Route::get('/categories',
	[
		'as'=>'categories.index',
		'uses'=>'CategoryController@index',
		'middleware' => ['permission:cat-list|cat-create|cat-edit|cat-delete']
	]);
	Route::get('/categories/create',
	[
		'as'=>'categories.create',
		'uses'=>'CategoryController@create',
		'middleware' => ['permission:cat-create']
	]);
	Route::post('/categories/store',
	[
		'as'=>'categories.store',
		'uses'=>'CategoryController@store',
		'middleware' => ['permission:cat-create']
	]);
	Route::get('/categories/show',
	[
		'as'=>'categories.show',
		'uses'=>'CategoryController@show'
	]);
	Route::get('/categories/edit/{id}',
	[
		'as'=>'categories.edit',
		'uses'=>'CategoryController@edit',
		'middleware' => ['permission:cat-edit']
	]);
	Route::patch('/categories/update/{id}',
	[
		'as'=>'categories.update',
		'uses'=>'CategoryController@update',
		'middleware' => ['permission:cat-edit']
	]);
	Route::get('/categories/delete/{id}',
	[
		'as'=>'categories.destroy',
		'uses'=>'CategoryController@destroy',
		'middleware' => ['permission:cat-delete']
	]);
});