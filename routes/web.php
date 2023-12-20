<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TeamController;

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