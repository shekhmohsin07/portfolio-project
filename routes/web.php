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
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectCategoryController;




Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/services', [PagesController::class, 'services'])->name('services');
Route::get('/service/{service:slug}', [PagesController::class, 'serviceDetails'])->name('service.details');
Route::get('/blogs', [PagesController::class, 'blogs'])->name('blogs');
Route::get('/blog/{blog:slug}', [PagesController::class, 'blogDetails'])->name('blog.details');
Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');
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


    Route::prefix('admin')->group(function () {

        // Media route
        Route::resource('media', MediaController::class);

        //service route
        Route::resource('service-categories', ServiceCategoryController::class);
        Route::resource('services', ServiceController::class);

        // Blogs Route
        Route::resource('blog-categories', BlogCategoryController::class);
        Route::resource('blogs', BlogController::class);

        Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
        Route::put('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
        Route::put('/comments/{comment}/reject', [CommentController::class, 'reject'])->name('comments.reject');
        Route::put('/comments/{comment}/pending', [CommentController::class, 'pending'])->name('comments.pending');
        Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

        // Project Routes
        Route::resource('project-categories', ProjectCategoryController::class);
        Route::resource('projects', ProjectController::class);
    });


    

});


require __DIR__.'/auth.php';
