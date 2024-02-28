<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventgalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasswordUpdateController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\RequestCertificateController;
use App\Http\Controllers\StudentCertificateController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
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
    if (auth()->check()) {
        return redirect('/dashboard');
    } else {
        return redirect()->route('home.index');
    }
});

Route::get('/dashboard', function () {
    return view('admin.change');
})->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('custom.logout');
    Route::get('/password/update', [PasswordUpdateController::class, 'show'])->name('password.update');
    Route::post('/password/update', [PasswordUpdateController::class, 'update']);
    Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::get('/dashboard/testimonials', [TestimonialController::class, 'adminShow'])->name('admin.testimonials.list');
    Route::get('/testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::put('/testimonial/{id}/update', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::delete('/testimonial/{id}/destroy', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
    Route::get('/dashboard/courses', [CourseController::class, 'adminShow'])->name('admin.courses.list');
    Route::get('/course/{id}/edit', [CourseController::class, 'edit'])->name('admin.courses.edit');
    Route::put('/course/{id}/update', [CourseController::class, 'update'])->name('admin.courses.update');
    Route::post('/course', [CourseController::class, 'store'])->name('course.store');
    Route::delete('/course/{id}/destroy', [CourseController::class, 'destroy'])->name('courses.destroy');

    Route::get('/dashboard/eventgalleries', [EventgalleryController::class, 'adminShow'])->name('admin.eventgalleries.list');
    Route::get('/eventgallery/create', [EventgalleryController::class, 'create'])->name('admin.eventgalleries.create');
    Route::post('/eventgallery/create', [EventgalleryController::class, 'store'])->name('eventgalleries.store');
    Route::get('/eventgallery/{id}/edit', [EventgalleryController::class, 'edit'])->name('admin.eventgalleries.edit');
    Route::get('eventgallery/{id}/images', [EventgalleryController::class, 'showImages'])->name('admin.eventgalleries.images_edit');
    Route::put('/eventgallery/{id}', [EventgalleryController::class, 'update'])->name('admin.eventgalleries.update');
    Route::delete('/eventgallery/{eventId}/images/{imageId}', [EventgalleryController::class, 'deleteImage'])->name('eventgalleries.deleteImage');
    Route::delete('/eventgallery/{id}', [EventgalleryController::class, 'destroy'])->name('eventgalleries.destroy');

    Route::get('/dashboard/clients', [ClientController::class, 'adminShow'])->name('admin.clients.list');
    Route::get('/client/create', [ClientController::class, 'create'])->name('admin.clients.create');
    Route::post('/client', [ClientController::class, 'store'])->name('client.store');
    Route::get('/client/{id}/edit', [ClientController::class, 'edit'])->name('admin.clients.edit');
    Route::put('/client/{id}/update', [ClientController::class, 'update'])->name('client.update');
    Route::delete('/client/{id}/destroy', [ClientController::class, 'destroy'])->name('clients.destroy');

    Route::get('/dashboard/placements', [PlacementController::class, 'adminShow'])->name('admin.placements.list');
    Route::get('/placement/create', [PlacementController::class, 'create'])->name('admin.placements.create');
    Route::post('/placement', [PlacementController::class, 'store'])->name('placement.store');
    Route::get('/placement/{id}/edit', [PlacementController::class, 'edit'])->name('admin.placements.edit');
    Route::put('/placement/{id}/update', [PlacementController::class, 'update'])->name('placements.update');
    Route::delete('/placement/{id}/destroy', [PlacementController::class, 'destroy'])->name('placements.destroy');

    Route::get('/dashboard/studentcertificates', [StudentcertificateController::class, 'adminShow'])->name('admin.studentcertificates.list');
    Route::get('/studentcertificate/create', [StudentcertificateController::class, 'create'])->name('admin.studentcertificates.create');
    Route::post('/studentcertificate', [StudentcertificateController::class, 'store'])->name('studentcertificate.store');
    Route::get('/studentcertificate/{id}/edit', [StudentcertificateController::class, 'edit'])->name('admin.studentcertificates.edit');
    Route::put('/studentcertificate/{id}/update', [StudentcertificateController::class, 'update'])->name('studentcertificates.update');
    Route::delete('/studentcertificate/{id}/destroy', [StudentcertificateController::class, 'destroy'])->name('studentcertificates.destroy');

    Route::get('/dashboard/requestcertificates', [RequestcertificateController::class, 'adminShow'])->name('admin.requestcertificates.list');
    Route::delete('/requestcertificate/{id}/destroy', [RequestCertificateController::class, 'destroy'])->name('requestcertificates.destroy');

    Route::get('/dashboard/contacts', [ContactController::class, 'adminShow'])->name('admin.contacts.list');
    Route::delete('/contact/{id}/destroy', [ContactController::class, 'destroy'])->name('contacts.destroy');

    Route::get('/dashboard/enrolls', [EnrollController::class, 'adminShow'])->name('admin.enrolls.list');
    Route::delete('/enroll/{id}/destroy', [EnrollController::class, 'destroy'])->name('enrolls.destroy');

    Route::get('/dashboard/blogs', [BlogController::class, 'adminShow'])->name('admin.blogs.list');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/blog/{id}/update', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{id}/destroy', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::get('/dashboard/teams', [TeamController::class, 'adminShow'])->name('admin.teams.list');
    Route::get('/team/create', [TeamController::class, 'create'])->name('admin.teams.create');
    Route::post('/team', [TeamController::class, 'store'])->name('team.store');
    Route::get('/team/{id}/edit', [TeamController::class, 'edit'])->name('admin.teams.edit');
    Route::put('/team/{id}/update', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/{id}/destroy', [TeamController::class, 'destroy'])->name('team.destroy');

    Route::get('/dashboard/courseCategory', [CourseCategoryController::class, 'adminShow'])->name('admin.coursecategory.list');
    Route::get('/courseCategory/create', [CourseCategoryController::class, 'create'])->name('admin.coursecategory.create');
    Route::post('/courseCategory', [CourseCategoryController::class, 'store'])->name('coursecategory.store');
    Route::get('/courseCategory/{id}/edit', [CourseCategoryController::class, 'edit'])->name('admin.coursecategory.edit');
    Route::put('/courseCategory/{id}/update', [CourseCategoryController::class, 'update'])->name('coursecategory.update');
    Route::delete('/courseCategory/{id}/destroy', [CourseCategoryController::class, 'destroy'])->name('coursecategory.destroy');

    Route::get('/dashboard/events', [EventController::class, 'adminShow'])->name('admin.events.list');
    Route::get('/event/create', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('/event', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/event/{id}/update', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{id}/destroy', [EventController::class, 'destroy'])->name('event.destroy');
});

Route::get('/home',[HomeController::class,'index'])->name('home.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blogs_slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/team', [TeamController::class, 'index'])->name('team.index');

Route::get('/client', [ClientController::class, 'index'])->name('client.index');

Route::get('/placement', [PlacementController::class, 'index'])->name('placement.index');

Route::get('/eventgallery', [EventgalleryController::class, 'index'])->name('eventgallery.index');
Route::get('/eventgallery/{eventgallery_slug}', [EventgalleryController::class, 'images'])->name('eventgallery.images');

Route::get('/event/episode-I', [EventController::class, 'index'])->name('event.index');
Route::view('/event/episode-II','events.ep');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/course', [CourseController::class, 'index'])->name('course.index');
Route::get('/course/coursecategories', [CourseController::class, 'coursecategories'])->name('course.coursecategories');
Route::get('/course/search', [CourseController::class, 'search'])->name('courses.search');
Route::get('/course/{course_slug}', [CourseController::class, 'show'])->name('course.show');

Route::get('/courseCategory', [CourseCategoryController::class, 'index'])->name('coursecategory.index');

Route::get('/enroll', [EnrollController::class, 'index'])->name('enroll.index');
Route::get('/enroll/create', [EnrollController::class, 'create'])->name('enroll.create');
Route::post('/enroll', [EnrollController::class, 'store'])->name('enroll.store');

Route::view('/terms', 'terms.terms')->name('terms');

Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');

Route::post('/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');

Route::get('/studentcertificate', [StudentCertificateController::class, 'index'])->name('studentcertificate.index');
Route::get('/studentcertificate/{verificationId}', [StudentCertificateController::class, 'show'])->name('studentcertificate.show');
Route::get('/studentcertificate/pdf/{id}', [StudentCertificateController::class, 'showPDF'])->name('studentcertificate.pdf');
Route::get('/studentcertificate/image/{id}', [StudentCertificateController::class, 'showPDF'])->name('studentcertificate.image');
Route::get('/studentcertificate/download/image/{id}', [StudentCertificateController::class, 'downloadImage'])->name('download.image');
Route::get('/studentcertificate/download/pdf/{id}', [StudentCertificateController::class, 'downloadPDF'])->name('download.pdf');

Route::get('/requestcertificate', [RequestCertificateController::class, 'index'])->name('requestcertificate.index');
Route::get('/requestcertificate/create', [RequestCertificateController::class, 'create'])->name('requestcertificate.create');
Route::post('/requestcertificate', [RequestCertificateController::class, 'store'])->name('requestcertificate.store');
// Route::get('/requestcertificate/{id}/edit', [RequestCertificateController::class, 'edit'])->name('requestcertificate.edit');
// Route::put('/requestcertificate/{id}/update', [RequestCertificateController::class, 'update'])->name('requestcertificate.update');
