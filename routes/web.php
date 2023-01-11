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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource(
    'cars',
    App\Http\Controllers\CarController::class
);
Route::post(
    'cars/{id}/todos', 
    [App\Http\Controllers\TodoController::class, 'store']
)->name('todos.store');
Route::delete(
    'todos/{id}/', 
    [App\Http\Controllers\TodoController::class, 'destroy']
)->name('todos.destroy');