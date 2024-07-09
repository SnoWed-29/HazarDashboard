<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

         // Store the image in the 'public/categories' directory and get the path
         $imagePath = $request->file('image')->store('categories', 'public');


        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $imageName,
        ]);

        if($category){
            return dd('created succesfully');
        }
        return dd('failed');
    
    }
            public function getSubcategories($categoryId)
        {
            $subCategories = SubCategory::where('category_id', $categoryId)->get();
            return response()->json($subCategories);
        }
}
