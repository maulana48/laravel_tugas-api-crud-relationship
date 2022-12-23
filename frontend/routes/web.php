<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ HomeController,  CategoryController, AuthorController};

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

Route::get('/w', function () {
    return view('welcome');
});

Route::prefix('Book')
    ->name('book.')
    ->controller(HomeController::class)
    ->group(function(){
        Route::get('/', 'index')->name('list');
        // Route::get('/authors', 'author')->name('author');
        // Route::get('/categories', 'category')->name('category');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/authors/{author}', 'authorList')->name('author-list');
        Route::get('/categories/{category}', 'categoryList')->name('category-list');

        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');

        Route::post('/', 'store')->name('store');
        Route::post('/update/{book}', 'update')->name('update');
        Route::post('/{book}', 'destroy')->name('destroy');
    });

Route::prefix('Category')
    ->name('category.')
    ->controller(CategoryController::class)
    ->group(function(){
        Route::get('/', 'index')->name('list');
        
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');

        Route::post('/', 'store')->name('store');
        Route::post('/update/{category}', 'update')->name('update');
        Route::post('/{category}', 'destroy')->name('destroy');
    });

Route::prefix('Author')
    ->name('author.')
    ->controller(AuthorController::class)
    ->group(function(){
        Route::get('/', 'index')->name('list');
        
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        
        Route::post('/', 'store')->name('store');
        Route::post('/update/{author}', 'update')->name('update');
        Route::post('/{author}', 'destroy')->name('destroy');
    });