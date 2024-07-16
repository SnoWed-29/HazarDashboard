<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\subCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class , 'index'])->name('homePage');
Route::get('/add-product', [PagesController::class, 'addProdcutPage'])->name('addProdcutPage');
Route::get('/add-category', [PagesController::class, 'addCategoryPage'])->name('addCategoryPage');
Route::get('/add-subcategory', [PagesController::class, 'addSubCategory'])->name('addSubCategoryPage');
Route::get('/edit-product/{slug}', [PagesController::class, 'editProduct'])->name('editProduct');


Route::post('/create-category', [CategoryController::class, 'createCategory'])->name('createCategory');
Route::post('/create-product', [ProductController::class, 'createProduct'])->name('createProduct');
Route::post('/create-subcategory', [subCategoryController::class, 'createSubCategory'])->name('createSubCategory');

// ajax 
Route::get('/get-subcategories/{categoryId}', [CategoryController::class, 'getSubcategories']);

Route::get('/test',[PagesController::class , 'test']);

//Providers , Composition
// delete Images from products