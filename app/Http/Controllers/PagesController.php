<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use PDO;
use Yajra\DataTables\Facades\DataTables;


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

    public function editProduct($slug)
{
    $product = Product::with('prodColorSizes.size')->where('slug', $slug)->first();

    if (!$product) {
        return abort(404);
    }
   
    $categories = Category::all();
    $subcategories = SubCategory::all();
    $colors = Color::all();
    $sizes = Size::all();

    return view('pages.edit-product')->with([
        'product' => $product,
        'cats' => $categories,
        'subs' => $subcategories,
        'colors' => $colors,
        'sizes' => $sizes,
    ]);
}


    public function addVariantsPage() {
        $sizes = Size::all();
        $colors = Color::all();
        return view('pages.create-variants')->with([
            'sizes'=>$sizes,
            'colors'=>$colors,
        ]);
    }

    public function listProducts()
    {
        $products = Product::with(['colors', 'subCategory.category', 'prodColorSizes.size', 'images'])->get();
        if($products->isEmpty()) {
            return redirect()->route('addProductPage');
        }
        
        $colors = Color::all();
        $sizes = Size::all();
        // dd($products);
        return view('pages.list-products')->with([
            'products' => $products ?: [],
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }

    public function getProductsData()
    {
        $products = Product::with(['colors', 'subCategory.category', 'prodColorSizes'])->get();

        return DataTables::of($products)
            ->addColumn('colors', function ($product) {
                return $product->colors->pluck('name')->implode(', ');
            })
            ->addColumn('category', function ($product) {
                return $product->subCategory->category->name ?? '';
            })
            ->addColumn('sub_category', function ($product) {
                return $product->subCategory->name ?? '';
            })
            ->addColumn('quantity', function ($product) {
                return $product->prodColorSizes->sum('quantity');
            })
            ->make(true);
    }
}
