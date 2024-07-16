<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

function createUniqueSlug($name, $model)
{
    $slug = Str::slug($name, '-');
    $originalSlug = $slug;
    $counter = 1;

    while ($model::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $counter;
        $counter++;
    }

    return $slug;
}
class ProductController extends Controller
{

    public function createProduct(Request $request)
{
    // Validate other fields first
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

    // Calculate the number of images
    $imageCount = count($request->file('images'));
    
    // Validate the thumbnail field
    $request->validate([
        'thumbnail' => 'required|integer|min:0|max:' . ($imageCount - 1),
    ]);

    $product = new Product();
    $product->name = $request->input('name');
    $product->slug = createUniqueSlug($request->input('name'), Product::class); // Generate a unique slug
    $product->price = $request->input('price');
    $product->cost = $request->input('cost');
    $product->description = $request->input('description');
    $product->subCategory_id = $request->input('subCategory');
    $product->is_active = $request->boolean('isActive');
    $product->in_stock = $request->boolean('inStock');
    $product->is_featured = $request->boolean('isFeatured');
    $product->on_sale = $request->boolean('onSale');

    try {
        $product->save();

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $thumbnailIndex = $request->input('thumbnail');

            foreach ($images as $index => $image) {
                $path = $image->store('public/images');

                $imageModel = new Image();
                $imageModel->product_id = $product->id;
                $imageModel->path = $path;
                $imageModel->is_thumbnail = ($index == $thumbnailIndex) ? true : false;
                $imageModel->save();
            }
        }
    } catch (\Throwable $th) {
        throw $th;
    }

    return redirect()->route('editProduct', ['slug' => $product->slug])->with('success', 'Ste one of Creating the product is successfull. ');

}
    
    


}
