<?php

use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\TierListsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentsController;

Route::get('/', [HomeController::class, 'home'])->name('home');

//categories
Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('/categories/create', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}', [CategoriesController::class, 'show'])->name('categories.show');

//tierlists
Route::get('/tierlists/{tierlist}', [TierListsController::class, 'show'])->name('tierlists.show');
Route::delete('/tierlists/destroy/{tierlist}', [TierListsController::class, 'destroy'])->name('tierlists.destroy');

//templates
Route::get('/templates/show/{template}', [TemplatesController::class, 'show'])->name('templates.show');
Route::middleware('auth')->group(function () {
    Route::get('/templates/create', [TemplatesController::class, 'create'])->name('templates.create');
    Route::post('/templates/create', [TemplatesController::class, 'store'])->name('templates.store');
    Route::post('/templates/{template}', [TemplatesController::class, 'save'])->name('templates.save-tierlist');
    Route::delete('/templates/destroy/{template}', [TemplatesController::class, 'destroy'])->name('templates.destroy');

    //comments
    Route::post('/comments/store', [CommentsController::class, 'store'])->name('comments.store');
});

//images and stuff
Route::middleware('auth')->group(function () {
    Route::get('/images/{image}', [ImageController::class, 'get'])->name('images.get');
});

//auth
Auth::routes();
Route::get('/auth/{provider}', [SocialController::class, 'redirectToProvider'])->name('auth.social');
Route::get('/auth/{provider}/callback', [SocialController::class, 'handleProviderCallback']);

//images
Route::middleware('auth')->group(function () {
    Route::post('/images/upload', [ImageController::class, 'upload'])->name('images.upload');
});

//moderator
Route::middleware(['auth', 'can:approve templates'])->group(function () {
    Route::get('/moderate', [TemplatesController::class, 'moderateTemplates'])->name('templates.moderate');
    Route::post('/moderate/approve/{template}', [TemplatesController::class, 'approveTemplate'])->name('templates.approve');
});

//users and profiles
Route::get('/profile/{user}', [UsersController::class, 'profile'])->name('profile');
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit/{user}', [UsersController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit/{user}', [UsersController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete/{user}', [UsersController::class, 'destroy'])->name('profile.destroy');
});
