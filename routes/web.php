<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sitemap', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/billing-portal', function (Request $request) {
        auth()->user()->createOrGetStripeCustomer();

        return auth()->user()->redirectToBillingPortal(route('dashboard'));
    });
    Route::post('/subscription/create', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/dashboard', function () {
        $subscription = auth()->user()->subscription('default');

        return view('dashboard', [
            'subscription' => $subscription,
        ]);
    })->name('dashboard');

    Route::get('/listings/create', [App\Http\Controllers\ListingsController::class, 'create'])->name('listings.create');
    Route::get('/listings/edit/{listing:id}', [App\Http\Controllers\ListingsController::class, 'edit'])->name('listings.edit');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'tree'])->name('categories.tree');

Route::get('/view-all', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categories.index');
Route::get('/{category:slug}', [App\Http\Controllers\CategoriesController::class, 'show'])->name('categories.show');
Route::get('/{category:slug}/{listing:slug}', [App\Http\Controllers\ListingsController::class, 'show'])->name('listings.show');


