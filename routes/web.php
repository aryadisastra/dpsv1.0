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

Route::get('/', function () {
    if (session('user')) {
        return redirect('/login');
    } else {
        Auth::logout();
        return view('main.index');
    }
});

Route::get('/login', 'AuthController@loginError');
Route::get('/logout', 'AuthController@logout');
Route::post('/dashboard-login', 'AuthController@doLogin');
Route::resource('/dashboard', 'DashboardController');

//======================INVENTORIES==============================
Route::resource('/inventories', 'InventoriesController');
Route::get('/inventories/create', 'InventoriesController@create');
Route::post('/inventories/store', 'InventoriesController@store');
Route::get('/inventories/{id}', 'InventoriesController@show');
Route::get('/inventories/edit/{id}', 'InventoriesController@edit');
Route::post('/inventories/update/{id}', 'InventoriesController@update');
Route::post('/delete_image', 'InventoriesController@delete_image');
//======================INVENTORIES==============================

//======================USER_MANAGEMENTS==============================
Route::resource('/user-management', 'UserManagementController');
Route::get('/user-management/create', 'UserManagementController@create');
Route::post('/user-management/store', 'UserManagementController@store');
Route::get('/user-management/{id}', 'UserManagementController@show');
Route::get('/user-management/edit/{id}', 'UserManagementController@edit');
Route::post('/user-management/update/{id}', 'UserManagementController@update');
//======================USER_MANAGEMENTS==============================

//======================REQUEST==============================
Route::resource('/request', 'PenyewaanController');
Route::get('/export', 'PenyewaanController@export');
Route::get('/request/create', 'PenyewaanController@create');
Route::post('/request/up_status', 'PenyewaanController@store');
Route::get('/request/{id}', 'PenyewaanController@show');
Route::post('/request/update/{id}', 'PenyewaanController@update');
//======================REQUEST==============================
