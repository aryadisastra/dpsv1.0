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
//======================INVENTORIES==============================

//======================USER_MANAGEMENTS==============================
Route::resource('/user-managements', 'UserManagementController');
Route::get('/user-managements/create', 'UserManagementController@create');
Route::post('/user-managements/store', 'UserManagementController@store');
Route::get('/user-managements/{id}', 'UserManagementController@show');
Route::get('/user-managements/edit/{id}', 'UserManagementController@edit');
Route::post('/user-managements/update/{id}', 'UserManagementController@update');
//======================USER_MANAGEMENTS==============================

//======================SElLS==============================
Route::resource('/sells', 'SellsController');
Route::get('/sells/create', 'SellsController@create');
Route::post('/sells/store', 'SellsController@store');
Route::get('/sells/{id}', 'SellsControllerr@show');
Route::get('/sells/edit/{id}', 'SellsController@edit');
Route::post('/sells/update/{id}', 'SellsController@update');
//======================SEllS==============================

//======================Outlet==============================
Route::resource('/outlet', 'outletController');
Route::get('/outlet/create', 'outletController@create');
Route::post('/outlet/store', 'outletController@store');
Route::get('/outlet/{id}', 'outletControllerr@show');
Route::get('/outlet/edit/{id}', 'outletController@edit');
Route::post('/outlet/update/{id}', 'outletController@update');
//======================outlet==============================

//======================PAYMENTS==============================
Route::resource('/payments', 'PaymentController');
Route::get('/payments-create', 'PaymentController@create');
//======================PAYMENTS==============================

//======================PARTNERS==============================
Route::resource('/partners', 'PartnersController');
Route::get('/partners-create', 'PartnersController@create');
//======================PARTNERS==============================
