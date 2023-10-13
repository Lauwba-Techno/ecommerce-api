<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeedController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Artisan;
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

// login
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authentication']);

Route::middleware(['auth'])->group(function () {

    // user
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user-update/{user}', [UserController::class, 'update']);

    // about
    Route::get('/', [AboutController::class, 'index']);
    Route::post('/about/{about}', [AboutController::class, 'update']);

    // feed
    Route::get('/feed', [FeedController::class, 'index']);
    Route::get('/feed-create', [FeedController::class, 'create']);
    Route::post('/feed-store', [FeedController::class, 'store']);
    Route::get('/feed-edit/{feed}', [FeedController::class, 'edit']);
    Route::post('/feed-update/{feed}', [FeedController::class, 'update']);
    Route::get('/feed-delete/{feed}', [FeedController::class, 'destroy']);

    // category
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category-create', [CategoryController::class, 'create']);
    Route::post('/category-store', [CategoryController::class, 'store']);
    Route::get('/category-edit/{category}', [CategoryController::class, 'edit']);
    Route::post('/category-update/{category}', [CategoryController::class, 'update']);
    Route::get('/category-delete/{category}', [CategoryController::class, 'destroy']);

    // subcategory
    Route::get('/subcategory', [SubcategoryController::class, 'index']);
    Route::get('/subcategory-create', [SubcategoryController::class, 'create']);
    Route::post('/subcategory-store', [SubcategoryController::class, 'store']);
    Route::get('/subcategory-edit/{subcategory}', [SubcategoryController::class, 'edit']);
    Route::post('/subcategory-update/{subcategory}', [SubcategoryController::class, 'update']);
    Route::get('/subcategory-delete/{subcategory}', [SubcategoryController::class, 'destroy']);

    // product
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product-create', [ProductController::class, 'create']);
    Route::post('/product-store', [ProductController::class, 'store']);
    Route::get('/product-edit/{product}', [ProductController::class, 'edit']);
    Route::post('/product-update/{product}', [ProductController::class, 'update']);
    Route::get('/product-delete/{product}', [ProductController::class, 'destroy']);

    // carousel
    Route::get('/carousel', [CarouselController::class, 'index']);
    Route::get('/carousel-create', [CarouselController::class, 'create']);
    Route::post('/carousel-store', [CarouselController::class, 'store']);
    Route::get('/carousel-edit/{carousel}', [CarouselController::class, 'edit']);
    Route::post('/carousel-update/{carousel}', [CarouselController::class, 'update']);
    Route::get('/carousel-delete/{carousel}', [CarouselController::class, 'destroy']);

    // help
    Route::get('/help', [HelpController::class, 'index']);
    Route::get('/help-create', [HelpController::class, 'create']);
    Route::post('/help-store', [HelpController::class, 'store']);
    Route::get('/help-edit/{help}', [HelpController::class, 'edit']);
    Route::post('/help-update/{help}', [HelpController::class, 'update']);
    Route::get('/help-delete/{help}', [HelpController::class, 'destroy']);

    // cart
    Route::get('cart', [CartController::class, 'index']);
    Route::get('cart/{cart}', [CartController::class, 'show']);

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::get('/test', function () {
    Artisan::call('storage:link');
    Artisan::call('migrate:fresh', ['--seed' => true]);
    $target = '/home/pkllauwb/project/ecommerce/public';
    $shortcut = '/home/pkllauwb/public_html/ecommerce';
    if (symlink($target, $shortcut)) {
        return response()->json(['message' => 'storage link dan migrate berhasil']);
    }
});
