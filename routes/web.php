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

Route::get('/list-products', [PagesController::class, 'listProducts'])->name('listProducts');
Route::get('/list-products/data', [PagesController::class, 'getProductsData'])->name('listProducts.data');


Route::get('/add-variants', [PagesController::class, 'addVariantsPage'])->name('addVariantsPage');

Route::post('/create-category', [CategoryController::class, 'createCategory'])->name('createCategory');
Route::post('/create-product', [ProductController::class, 'createProduct'])->name('createProduct');
Route::post('/create-subcategory', [subCategoryController::class, 'createSubCategory'])->name('createSubCategory');

Route::post('/place-order/product/{prodId}', [ProductController::class, 'placeOrder'])->name('placeOrder');

Route::post('/create-size', [ProductController::class, 'createSize'])->name('createSize');
Route::post('/create-color', [ProductController::class, 'createColor'])->name('createColor');

Route::post('/handle-var/{id}', [ProductController::class, 'handleVarients'])->name('handleVarients');

// ajax 
Route::get('/get-subcategories/{categoryId}', [CategoryController::class, 'getSubcategories']);
Route::get('/product/{productId}/sizes/{colorId}', [ProductController::class, 'getSizes']);

Route::get('/test',[PagesController::class , 'test']);

//Providers , Composition
// delete Images from products