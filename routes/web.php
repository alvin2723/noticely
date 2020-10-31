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
Route::group(['middleware' => ['auth', 'role:Staff']], function () {

    Route::livewire('/', 'post.index')->name('post.index');
    Route::livewire('/detail-mom/{id_mom}', 'post.detailmom')->name('post.detail-mom');
    Route::livewire('/create-mom', 'post.create-mom')->name('post.create-mom');
    Route::livewire('/draft-mom', 'post.draft-mom')->name('post.draft-mom');
    Route::livewire('/draft-detail-mom/{id_mom}', 'post.draft-detail-mom')->name('post.draft-detail-mom');
    Route::livewire('/edit-mom/{id_mom}', 'post.edit-mom')->name('post.edit-mom');
    Route::livewire('/division', 'post.divisi')->name('post.divisi');
});
Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::get('/dashboard', 'AdminController@index')->name('admin.home');
    // Route::get('/home', 'HomeController@index')->name('home');
});
