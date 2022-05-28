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
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/backoffice', 'ProductController@create')->name('add-products');
    
    Route::post('/product', 'ProductController@store')->name('save-products');
    
    Route::get('/category', 'CategoryController@index')->name('show-category');
    
    Route::get('/new-category', 'CategoryController@create')->name('add-category');
    
    Route::post('/category', 'CategoryController@store')->name('save-category');
    
    Route::patch('/category/{uuid}', 'CategoryController@update')->name('update-category');
    
    Route::delete('/category/{uuid}', 'CategoryController@delete')->name('delete-category');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/products', 'ProductController@index')->name('products');

