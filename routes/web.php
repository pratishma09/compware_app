<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PlacementController;

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

Route::get('/home', function () {
    dd(\Illuminate\Support\Facades\Auth::user());
})->middleware(middleware:'auth');

Route::get('/blog',[BlogController::class,'index'])->name('blog.index'); //index function in blog controller
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create');
Route::post('/blog',[BlogController::class,'store'])->name('blog.store');
Route::get('/blog/{blogs_slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/{id}/edit',[BlogController::class,'edit'])->name('blog.edit');
Route::put('/blog/{id}/update',[BlogController::class,'update'])->name('blog.update');
Route::get('/blog/{blog}/destroy',[BlogController::class,'destroy'])->name('blog.destroy');


Route::get('/team',[TeamController::class,'index'])->name('team.index');
Route::get('/team/create',[TeamController::class,'create'])->name('team.create');
Route::post('/team',[TeamController::class,'store'])->name('team.store');
Route::get('/team/{id}/edit',[TeamController::class,'edit'])->name('team.edit');
Route::put('/team/{id}/update',[TeamController::class,'update'])->name('team.update');
Route::get('/team/{id}/destroy',[TeamController::class,'destroy'])->name('team.destroy');

Route::get('/client',[ClientController::class,'index'])->name('client.index');
Route::get('/client/create',[ClientController::class,'create'])->name('client.create');
Route::post('/client',[ClientController::class,'store'])->name('client.store');
Route::get('/client/{id}/edit',[ClientController::class,'edit'])->name('client.edit');
Route::put('/client/{id}/update',[ClientController::class,'update'])->name('client.update');
Route::get('/client/{id}/destroy',[ClientController::class,'destroy'])->name('client.destroy');

Route::get('/placement',[PlacementController::class,'index'])->name('placement.index');
Route::get('/placement/create',[PlacementController::class,'create'])->name('placement.create');
Route::post('/placement',[PlacementController::class,'store'])->name('placement.store');
Route::get('/placement/{id}/edit',[PlacementController::class,'edit'])->name('placement.edit');
Route::put('/placement/{id}/update',[PlacementController::class,'update'])->name('placement.update');
Route::get('/placement/{id}/destroy',[PlacementController::class,'destroy'])->name('placement.destroy');