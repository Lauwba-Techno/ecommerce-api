<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\CarouselController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FeedController;
use App\Http\Controllers\Api\HelpController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SubcategoryController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// user
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'Authentication']);

// about
Route::get('about', [AboutController::class, 'index']);
Route::get('about/{about}', [AboutController::class, 'show']);

// carousel
Route::get('carousel', [CarouselController::class, 'index']);

// Feed
Route::get('feed', [FeedController::class, 'index']);

// help
Route::get('help', [HelpController::class, 'index']);
Route::get('help/{help}', [HelpController::class, 'show']);

// category
Route::get('category', [CategoryController::class, 'index']);
Route::get('category/{category}', [CategoryController::class, 'show']);

// subcategory
Route::get('subcategory', [SubcategoryController::class, 'index']);
Route::get('subcategory/{subcategory}', [SubcategoryController::class, 'show']);

// product
Route::get('product', [ProductController::class, 'index']);
Route::get('product/{product}', [ProductController::class, 'show']);

// cart
Route::get('cart', [CartController::class, 'index']);
Route::get('cart/{cart}', [CartController::class, 'show']);
Route::post('cart-add', [CartController::class, 'store']);
Route::post('cart-update/{cart}', [CartController::class, 'update']);
Route::get('cart-delete/{cart}', [CartController::class, 'destroy']);


