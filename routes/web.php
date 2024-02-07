<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\EventgalleryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasswordUpdateController;

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
    if (auth()->check()) {
        return redirect('/dashboard');
    } else {
        return view('auth.login');
    }
});

Route::get('/dashboard', function () {
    return view('admin.change'); // Adjust the view name as needed
})->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('custom.logout');
    Route::get('/password/update', [PasswordUpdateController::class, 'show'])->name('password.update');
    Route::post('/password/update', [PasswordUpdateController::class, 'update']);
    Route::get('/course/create',[CourseController::class,'create'])->name('course.create');
});

Route::get('/home', function () {
    $courseController = new CourseController();
    $clientController = new ClientController();
    $placementController=new PlacementController();
    $enrollController=new EnrollController();

    $courses = $courseController->search();
    $clients = $clientController->search();
    $placements= $placementController->index();
    $enrolls=$enrollController->index();

    return view('home', compact('courses', 'clients','placements','enrolls'));
});

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

Route::get('/eventgallery', [EventgalleryController::class,'index'])->name('eventgallery.index');
Route::get('/eventgallery/create', [EventgalleryController::class, 'create'])->name('eventgallery.create');
Route::post('/eventgallery/create', [EventgalleryController::class, 'store']);
Route::get('/eventgallery/{eventgallery_slug}',[EventgalleryController::class,'images'])->name('eventgallery.images');
Route::get('/eventgallery/{id}/edit', [EventgalleryController::class, 'edit'])->name('eventgallery.edit');
Route::put('/eventgallery/{id}', [EventgalleryController::class, 'update'])->name('eventgallery.update');
Route::delete('/eventgallery/{eventId}/images/{imageId}', [EventgalleryController::class, 'deleteImage'])->name('eventgallery.deleteImage');
Route::delete('/eventgallery/{id}', [EventgalleryController::class, 'destroy'])->name('eventgallery.destroy');

Route::get('/event',[EventController::class,'index'])->name('event.index');
Route::get('/event/create',[EventController::class,'create'])->name('event.create');
Route::post('/event',[EventController::class,'store'])->name('event.store');
Route::get('/event/{id}/edit',[EventController::class,'edit'])->name('event.edit');
Route::put('/event/{id}/update',[EventController::class,'update'])->name('event.update');
Route::get('/event/{id}/destroy',[EventController::class,'destroy'])->name('event.destroy');

Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
Route::get('/contact/create',[ContactController::class,'create'])->name('contact.create');
Route::post('/contact',[ContactController::class,'store'])->name('contact.store');

Route::get('/course',[CourseController::class,'index'])->name('course.index'); //index function in blog controller
Route::post('/course',[CourseController::class,'store'])->name('course.store');
Route::get('/course/{course_slug}', [CourseController::class, 'show'])->name('course.show');
Route::get('/course/{id}/edit',[CourseController::class,'edit'])->name('course.edit');
Route::put('/course/{id}/update',[CourseController::class,'update'])->name('course.update');
Route::get('/course/{id}/destroy',[CourseController::class,'destroy'])->name('course.destroy');

Route::get('/courseCategory',[CourseCategoryController::class,'index'])->name('coursecategory.index');
Route::get('/courseCategory/create',[CourseCategoryController::class,'create'])->name('coursecategory.create');
Route::post('/courseCategory',[CourseCategoryController::class,'store'])->name('coursecategory.store');
Route::get('/courseCategory/{id}/edit',[CourseCategoryController::class,'edit'])->name('coursecategory.edit');
Route::put('/courseCategory/{id}/update',[CourseCategoryController::class,'update'])->name('coursecategory.update');
Route::get('/courseCategory/{id}/destroy',[CourseCategoryController::class,'destroy'])->name('coursecategory.destroy');

Route::get('/enroll',[EnrollController::class,'index'])->name('enroll.index');
Route::get('/enroll/create',[EnrollController::class,'create'])->name('enroll.create');
Route::post('/enroll',[EnrollController::class,'store'])->name('enroll.store');

Route::view('/terms', 'terms.terms')->name('terms');