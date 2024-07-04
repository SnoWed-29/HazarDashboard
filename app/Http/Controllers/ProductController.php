<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'category' => 'required|string',
        'subCategory' => 'required|string',
        'images' => 'required',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // Add validation for other fields as needed
    ]);
dd($request);
    $product = new Product();
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');
    $product->category = $request->input('category');
    $product->subCategory = $request->input('subCategory');
    $product->isActive = $request->has('isActive');
    $product->inStock = $request->has('inStock');
    $product->isFeatured = $request->has('isFeatured');
    $product->onSale = $request->has('onSale');

    if ($request->hasFile('images')) {
        $images = [];
        foreach ($request->file('images') as $image) {
            $path = $image->store('public/images');
            $images[] = $path;
        }
        $product->images = json_encode($images);
    }

    

    try {
    $product->save();
        
    } catch (\Throwable $th) {
        throw $th;
    }
    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}
}
