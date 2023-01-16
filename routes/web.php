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

// Todos
Route::post(
    'cars/{id}/todos',
    [App\Http\Controllers\TodoController::class, 'store']
)->name('todos.store');
Route::delete(
    'todos/{id}/', 
    [App\Http\Controllers\TodoController::class, 'destroy']
)->name('todos.destroy');

// Gadgets

Route::post(
    'gadgets/store',
    [App\Http\Controllers\GadgetController::class, 'store']
)->name("gadgets.store");
Route::get(
    'gadgets/create',
    [App\Http\Controllers\GadgetController::class, 'create']
)->name("gadgets.create");
Route::get(
    'gadgets/index',
    [App\Http\Controllers\GadgetController::class, 'index']
)->name("gadgets.index");
Route::delete(
    'gadgets/{id}/', 
    [App\Http\Controllers\GadgetController::class, 'destroy']
)->name('gadgets.destroy');


//cargadget

Route::post('cargadgets/store', 
    [App\Http\Controllers\CarGadgetController::class, 'store']
)->name('cargadgets.store');

Route::get('cargadgets/create',
[App\Http\Controllers\CarGadgetController::class, 'create']
)->name('cargadgets.create')










