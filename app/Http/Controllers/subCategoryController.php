<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class subCategoryController extends Controller
{   
    public function createSubCategory(Request $request){

        $validatedData = $request->validate([
            'name'=>['required'],
            'slug'=>['required'],
            'category'=>['required']
        ]);

        $SubCategory = SubCategory::create([
            'name'=>$validatedData['name'],
            'slug'=>$validatedData['slug'],
            'category_id'=>$validatedData['category']
        ]);
        if($SubCategory){
            return redirect()->back()->with('success', 'subCategory created successfully');
        }

        return redirect()->back()->with('error', 'error creating subCategory');
    }
}
