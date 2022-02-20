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

    public function edit($id){
        $category = Category::find($id);
        return response()->json(['categoryById' => $category]);
    }

    public function update(Request $request, Category $category, $id){
        // dd($request->all());
        $category = Category::find($id);
        $category->cat_name = $request->cat_name;
        $category->save();
        return response()->json(['success' => true]);
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        if(isset($category)){
                return response()->json(['success'=>true]);
        }else{
            return response()->json(['error'=> true]);
        }
    }

    public function formValidation(Request $request){
        $request->validate([
            'cat_name' => 'required',
        ]);
    }
}
