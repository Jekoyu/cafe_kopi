<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminDashboardController;

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

// Public Menu Page
Route::get('/menu', function () {
    $categories = \App\Models\Category::with([
        'menus' => function ($q) {
            $q->orderBy('name');
        }
    ])->orderBy('name')->get();

    return view('menu.index', compact('categories'));
})->name('menu.public');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
| Menu & Categories Management
| (nanti bisa ditambah middleware auth)
*/
Route::prefix('admin')->group(function () {

    // DASHBOARD
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // MENU CRUD
    Route::resource('menu', MenuController::class);

    // CATEGORIES CRUD
    Route::resource('categories', CategoryController::class);

});
