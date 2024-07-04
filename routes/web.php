<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class , 'index'])->name('homePage');
Route::get('/add-product', [PagesController::class, 'addProdcutPage'])->name('addProdcutPage');
Route::get('/add-category', [PagesController::class, 'addCategoryPage'])->name('addCategoryPage');

Route::post('/create-category', [CategoryController::class, 'createCategory'])->name('createCategory');
Route::post('/create-product', [ProductController::class, 'createProduct'])->name('createProduct');

