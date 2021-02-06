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

Auth::routes(['verify' => true]);

/* Route::get('/', function () {
    return view('welcome');
}); */

/* Route::get('demo', function () {
    return view('theme.backoffice.pages.demo');
}); */

/* Route::get('/home', 'HomeController@index')->name('home'); */

// Grupo de rutas del backoffice
Route::group(['middleware' => ['auth'], 'as' => 'backoffice.'], function(){
    // Route::get('role', 'RoleController@index')->name('role.index');
    Route::resource('user', 'UserController');
    Route::get('user/{user}/assign_role', 'UserController@assign_role')->name('user.assign_role');
    Route::post('user/{user}/role_assignment', 'UserController@role_assignment')->name('user.role_assignment');
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
});