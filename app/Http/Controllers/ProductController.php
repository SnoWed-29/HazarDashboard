<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    return redirect()->route('editProduct', ['slug' => $product->slug])->with('success', 'Step one of Creating the product is successfull. ');

}

    public function createColor(Request $request){
            
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code'=>'required'
        ]);
        $color = Color::create([
            'name'=>$validatedData['name'],
            'code'=>$validatedData['code'],
        ]);
        if(!$color){
            return redirect()->back()->with('error', 'Failed to create The Color');
        }
            return redirect()->route('addVariantsPage')->with('success', ' Size is created successfully. ');
    }

    public function createSize (Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code'=>'required'
        ]);
        
         $size = Size::create([
            'name'=>$validatedData['name'],
            'code'=>$validatedData['code'],
         ]);

         if(!$size){
            return redirect()->back()->with('error', 'Failed to create The Size');
         }
            return redirect()->route('addVariantsPage')->with('success', ' Size is created successfully. ');
    }

    public function handleVarients(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $request->validate([
        'variants.colors' => 'required|array',
        'variants.colors.*' => 'integer|exists:colors,id',
        'variants.sizes' => 'required|array',
        'variants.sizes.*' => 'integer|exists:sizes,id',
        'variants.quantities' => 'required|array',
        'variants.quantities.*' => 'integer|min:1',
    ]);

    // Clear existing variants
    foreach ($product->colors as $color) {
        $product->colors()->detach($color->id);
    }

    // Handle the variants
    foreach ($request->variants['colors'] as $index => $colorId) {
        $sizeId = $request->variants['sizes'][$index];
        $quantity = $request->variants['quantities'][$index];

        // Attach the color to the product
        $product->colors()->attach($colorId);

        // Find the prod_color pivot id
        $prodColor = DB::table('prod_color')
            ->where('product_id', $product->id)
            ->where('color_id', $colorId)
            ->first();

        // Attach the size and quantity to the prod_color_size table
        DB::table('prod_color_size')->insert([
            'prod_color_id' => $prodColor->id,
            'size_id' => $sizeId,
            'quantity' => $quantity,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    return redirect()->back()->with('success', 'Variants updated successfully');
}


}
