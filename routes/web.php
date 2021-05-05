<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth:web']], function () {


    // Product
    Route::get('/products', ['uses' => 'ProductController@index', 'as' => 'products.index',]);
    Route::get('/products/create', ['uses' => 'ProductController@create', 'as' => 'products.create',]);
    Route::get('/products/edit/{id}', ['uses' => 'ProductController@edit', 'as' => 'products.edit',]);
    Route::put('/products/update/{id}', ['uses' => 'ProductController@update', 'as' => 'products.update',]);
    Route::post('/products/store', ['uses' => 'ProductController@store', 'as' => 'products.store',]);
    Route::get('/products/{id}', ['uses' => 'ProductController@show', 'as' => 'products.show',]);
    Route::delete('/products/{id}', ['uses' => 'ProductController@destroy', 'as' => 'products.destroy',]);
    // role
    Route::get('/roles', ['uses' => 'RoleController@index', 'as' => 'roles.index',]);
    Route::get('/roles/create', ['uses' => 'RoleController@create', 'as' => 'roles.create',]);
    Route::get('/roles/{id}/edit', ['uses' => 'RoleController@edit', 'as' => 'roles.edit',]);
    Route::patch('/roles/update/{id}', ['uses' => 'RoleController@update', 'as' => 'roles.update',]);
    Route::post('/roles/store', ['uses' => 'RoleController@store', 'as' => 'roles.store',]);
    Route::get('/roles/{id}', ['uses' => 'RoleController@show', 'as' => 'roles.show',]);
    Route::delete('/roles/{id}', ['uses' => 'RoleController@destroy', 'as' => 'roles.destroy',]);
    // user
    Route::get('/users', ['uses' => 'UserController@index', 'as' => 'users.index',]);
    Route::get('/users/create/', ['uses' => 'UserController@create', 'as' => 'users.create',]);
    Route::get('/users/edit/{id}/', ['uses' => 'UserController@edit', 'as' => 'users.edit',]);
    Route::patch('/users/update/{id}/', ['uses' => 'UserController@update', 'as' => 'users.update',]);
    Route::post('/users/store/', ['uses' => 'UserController@store', 'as' => 'users.store',]);
    Route::get('/users/{id}/', ['uses' => 'UserController@show', 'as' => 'users.show',]);
    Route::delete('/users/{id}/', ['uses' => 'UserController@destroy', 'as' => 'users.destroy',]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
