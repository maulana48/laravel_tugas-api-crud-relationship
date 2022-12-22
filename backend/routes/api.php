<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ BookController, CategoryController, AuthorController };

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('Book')
    ->name('book.')
    ->controller(BookController::class)
    ->group(function(){
        Route::get('/', 'index')->name('list');
        // Route::get('/authors', 'author')->name('author');
        // Route::get('/categories', 'category')->name('category');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/authors/{author}', 'authorList')->name('author-list');
        Route::get('/categories/{category}', 'categoryList')->name('category-list');
        
        Route::post('/', 'store')->name('store');
        Route::post('/update/{book}', 'update')->name('update');
        Route::post('/{book}', 'destroy')->name('destroy');
    });

Route::prefix('Category')
    ->name('category.')
    ->controller(CategoryController::class)
    ->group(function(){
        Route::get('/', 'index')->name('list');
        Route::get('/{id}', 'show')->name('show');
        
        Route::post('/', 'store')->name('store');
        Route::post('/update/{category}', 'update')->name('update');
        Route::post('/{category}', 'destroy')->name('destroy');
    });

Route::prefix('Author')
    ->name('author.')
    ->controller(AuthorController::class)
    ->group(function(){
        Route::get('/', 'index')->name('list');
        Route::get('/{id}', 'show')->name('show');
        
        Route::post('/', 'store')->name('store');
        Route::post('/update/{author}', 'update')->name('update');
        Route::post('/{author}', 'destroy')->name('destroy');
    });
