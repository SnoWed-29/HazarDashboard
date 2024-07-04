<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class , 'index'])->name('homePage');
Route::get('/add-product', [PagesController::class, 'addProdcutPage'])->name('addProdcutPage');
Route::get('/add-category', [PagesController::class, 'addCategoryPage'])->name('addCategoryPage');

Route::post('/create-category', [CategoryController::class, 'createCategory'])->name('createCategory');