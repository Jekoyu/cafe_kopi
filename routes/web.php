<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Public & Admin routes for Kopi 1815
|
*/

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES
|--------------------------------------------------------------------------
*/
Route::view('/', 'home')->name('home');

Route::view('/about', 'about')->name('about');

Route::view('/contact', 'contact')->name('contact');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
| Menu & Categories Management
| (nanti bisa ditambah middleware auth)
*/
Route::prefix('admin')->group(function () {

    // MENU CRUD
    Route::resource('menu', MenuController::class);

    // CATEGORIES CRUD
    Route::resource('categories', CategoryController::class);

});
