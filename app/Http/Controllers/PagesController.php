<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function addProdcutPage(){
        $categories = Category::all();
        $prods = Product::all();
        return view('pages.create-product')->with([
            'cats'=>$categories,
            'prods'=>$prods
        ]);
    }
    
    public function addCategoryPage(){
        $categories = Category::all();
        return view('pages.create-category')->with([
            'cats'=>$categories
        ]);
    }
    public function addSubCategory(){
        $categories = Category::all();
        $subcategories = SubCategory::all();

        return view('pages.create-subCategory')->with([
            'cats'=>$categories,
            'subs'=>$subcategories
        ]);
    }
    public function test(){
        SubCategory::where('id', 1)->delete();
        SubCategory::where('id', 2)->delete();
        SubCategory::where('id', 3)->delete();
        
        return dd(SubCategory::all()); 
    }
}
