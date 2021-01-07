<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


//Route::get('/', function () {
//    return view('welcome');
//});
Route::prefix('/',)->group(function(){
//    Route::get('/',function(){
//        return view('UserInterface.home');
//    });
    Route::get("/scholarship",[ProductController::class,'scholarship'])->name('products.scholarship');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/product')->group(function (){
    Route::get("/",[ProductController::class,'index'])->name('products.index');
    Route::get("/index",[ProductController::class,'index'])->name('products.index');
    Route::get("/scholarship",[ProductController::class,'scholarship'])->name('products.scholarship');
    Route::get("/create",[ProductController::class,'create'])->name('products.create');
    Route::post("/store",[ProductController::class,'store'])->name('products.store');
    Route::get("/edit/{id}",[ProductController::class,'edit'])->name('products.edit');
    Route::put("/update/{id}",[ProductController::class,'update'])->name('products.update');
    Route::get("/delete/{id}",[ProductController::class,'delete'])->name('products.delete');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});




