<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/view-all', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categories.index');
Route::get('/{category:slug}', [App\Http\Controllers\CategoriesController::class, 'show'])->name('categories.show');
Route::get('/{category:slug}/{listing:slug}', [App\Http\Controllers\ListingsController::class, 'show'])->name('listings.show');