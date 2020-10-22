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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::group(['middleware' => ['role:Staff']],function(){

    Route::livewire('/home', 'post.index')->name('post.index');
    Route::livewire('/admin', 'post.admin_index')->name('post.admin');
    Route::livewire('/detail-mom', 'post.detailmom')->name('post.detail-mom');
});
Route::group(['middleware' => ['role:Admin']], function(){
    Route::get('/dashboard', 'AdminController@index')->name('admin.home');
    // Route::get('/home', 'HomeController@index')->name('home');
});
