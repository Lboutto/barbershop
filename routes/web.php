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

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index')->name('home');

Route::resource('sales', 'SaleController');

 Route::prefix('user')->group(function () {
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('create', 'UserController@create')->name('user.create');
        Route::post('store', 'UserController@store')->name('user.store');
        Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
        Route::put('update/{id}', 'UserController@update')->name('user.update');
        Route::delete('delete/{id}', 'UserController@destroy')->name('user.delete');
    });

    Route::prefix('role')->group(function () {
        Route::get('/', 'RoleController@index')->name('role.index');
        Route::get('create', 'RoleController@create')->name('role.create');
        Route::post('store', 'RoleController@store')->name('role.store');
        Route::get('assign/{id}', 'RoleController@assign')->name('role.assign');
        Route::post('save_assign', 'RoleController@save_assign')->name('role.save_assign');
        Route::delete('delete/{id}', 'RoleController@destroy')->name('role.delete');
    });

    Route::prefix('permission')->group(function () {
        Route::get('/', 'PermissionController@index')->name('permission.index');
        Route::get('create', 'PermissionController@create')->name('permission.create');
        Route::post('store', 'PermissionController@store')->name('permission.store');
        Route::delete('delete/{id}', 'PermissionController@destroy')->name('permission.delete');
    });
