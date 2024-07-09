<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function createProduct(Request $request)
{
    
// dd();
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'cost' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'subCategory' => 'required|integer|exists:sub_categories,id',
        'images' => 'required|array|min:1',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'isActive' => 'boolean',
        'inStock' => 'boolean',
        'isFeatured' => 'boolean',
        'onSale' => 'boolean',
    ]);
    $product = new Product();
    $product->name = $request->input('name');
    $product->slug = Str::slug($request->input('name'), '-'); // Generate a slug from the name
    $product->price = $request->input('price');
    $product->cost = $request->input('cost');
    $product->description = $request->input('description');
    $product->subCategory_id = $request->input('subCategory'); // Match the fillable attribute
    $product->is_active = $request->boolean('isActive');
    $product->in_stock = $request->boolean('inStock');
    $product->is_featured = $request->boolean('isFeatured');
    $product->on_sale = $request->boolean('onSale');

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

    return redirect()->route('addProdcutPage')->with('success', 'Product created successfully.');
}


}
