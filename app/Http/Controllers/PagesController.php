<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function addProdcutPage(){
        return view('pages.create-product');
    }
    
    public function addCategoryPage(){
        return view('pages.create-category');
    }
}
