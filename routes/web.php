<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CRMControlerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use \App\Http\Controllers\ProductController;

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

Route::group(['as' => 'site.'], function () {

    Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('welcome');
    Route::get('/news', 'App\Http\Controllers\SiteController@news')->name('news.index');
    Route::get('/shop','App\Http\Controllers\SiteController@shop')->name('shop.index');
    Route::get('/dashboard', function () {
        $user=Auth::user();
        return view('dashboard',$user);
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

});


Route::group([
    'middleware' => ['role:admin'],
    'as' => 'crm.',
    'prefix' => 'crm'
], function () {
    Route::get('/',[CRMControlerController::class,'index'])->name('home');
    Route::get('/users', [HomeController::class,'editAllUsers'])->name('users.index');
    Route::get('/users/{user}/edit', [HomeController::class,'editUser'])->name('users.edit');
    Route::post('/users/{user}/update', [HomeController::class,'update'])->name('users.update');
    Route::delete('/users/{user}',[HomeController::class,'destroy'])->name('users.destroy');

    Route::get('/news/create', [NewsController::class,'create'])->name('news.create');
    Route::POST('/news/store', [NewsController::class,'store'])->name('news.store');
    Route::get('/news', [NewsController::class,'index'])->name('news.index');
    Route::get('/news/{news}/edit', [NewsController::class,'edit'])->name('news.edit');
    Route::post('/news/{news}/update', [NewsController::class,'update'])->name('news.update');
    Route::delete('/news/{news}',[NewsController::class,'destroy'])->name('news.destroy');
    Route::get('/news/{news}', [NewsController::class,'published'])->name('news.published');

    Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::get('/categories/{category_id}/childs',[CategoryController::class,'indexChild'])->name('categories.child.index');
    Route::get('/categories/child/create',[CategoryController::class,'createChild'])->name('categories.child.create');
    Route::post('categories/store',[CategoryController::class,'store'])->name('categories.store');
    Route::delete('categories/{categories}',[CategoryController::class,'destroy'])->name('categories.destroy');

    Route::get('/products',[ProductController::class,'index'])->name('products.index');
});
require __DIR__ . '/auth.php';
