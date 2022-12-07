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
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
Route::get('/users/details/{id}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.details');

Route::get('/user/edit/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::post('/user/destroy', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
Route::post('/user/create', [\App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::get('/user/list', [\App\Http\Controllers\UserController::class, 'list'])->name('user.list');

// EVENTS


Route::get('/events', [\App\Http\Controllers\EventController::class, 'index'])->name('event');
Route::get('/event/new', [\App\Http\Controllers\EventController::class, 'new'])->name('event.new');
Route::get('/events/list', [\App\Http\Controllers\EventController::class, 'list'])->name('event.list');
