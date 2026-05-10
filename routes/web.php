<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogCategoryController;

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/my-services', [PagesController::class, 'services'])->name('my-services');
Route::get('/blogs', [PagesController::class, 'blogs'])->name('blogs');
Route::get('/projects', [PagesController::class, 'projects'])->name('projects');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');



Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard'); 
    })->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Media route
    Route::resource('media', MediaController::class);

    //service route
    Route::resource('service-categories', ServiceCategoryController::class);
    Route::resource('services', ServiceController::class);

    // Blogs Route
    Route::resource('blog-categories', BlogCategoryController::class);
});


require __DIR__.'/auth.php';
