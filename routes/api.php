<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceCategoryController;

Route::apiResource('service-categories', ServiceCategoryController::class);