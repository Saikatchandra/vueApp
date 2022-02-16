<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryList = Category::all();
        return response()->json(['categoryList' => $categoryList],200);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $this->formValidation($request);

        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->save();

        return response()->json(['success' => true]);

    }
    public function formValidation(Request $request){
        $request->validate([
            'cat_name' => 'required',
        ]);
    }
}
