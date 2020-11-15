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
Route::group(['middleware' => ['auth', 'role:Staff|Supervisor|Manager']], function () {

    Route::livewire('/', 'post.index')->name('post.index');
    Route::livewire('/detail-mom/{id_mom}', 'post.detailmom')->name('post.detail-mom');
    Route::livewire('/create-mom', 'post.create-mom')->name('post.create-mom');
    Route::livewire('/draft-mom', 'post.draft-mom')->name('post.draft-mom');
    Route::livewire('/draft-detail-mom/{id_mom}', 'post.draft-detail-mom')->name('post.draft-detail-mom');
    Route::livewire('/edit-mom/{id_mom}', 'post.edit-mom')->name('post.edit-mom');
    Route::livewire('/division', 'post.divisi')->name('post.divisi');
    Route::livewire('/sms', 'post.sendsms')->name('post.sendsms');
});
Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::livewire('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::livewire('/data-staff', 'admin.users')->name('admin.users');
    Route::livewire('/data-manager', 'admin.users-manager')->name('admin.users-manager');
    Route::livewire('/data-supervisor', 'admin.users-supervisor')->name('admin.users-supervisor');
    Route::livewire('/create-user', 'admin.create-user')->name('admin.create-user');
    Route::livewire('/edit/user/{id}', 'admin.edit-user')->name('admin.edit-user');
    Route::livewire('/data-mom', 'admin.data-mom')->name('admin.data-mom');
    Route::livewire('/view/mom/{id}', 'admin.view-mom')->name('admin.view-mom');
    Route::livewire('/data-division', 'admin.data-division')->name('admin.data-division');
    Route::livewire('/create-division', 'admin.create-division')->name('admin.create-division');
    // Route::get('/home', 'HomeController@index')->name('home');
});
