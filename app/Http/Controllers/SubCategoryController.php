<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{

    public function index()
    {
        $subCategoryList = SubCategory::with('categories')->get();
        // dd($subCategoryList);
        return response()->json(['subCategoryList' => $subCategoryList],200);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $this->formValidation($request);

        $subCategory = new SubCategory();
        $subCategory->cat_id = $request->cat_id;
        $subCategory->sub_cat_name = $request->sub_cat_name;
        $subCategory->save();

        return response()->json(['success' => true]);

    }

    public function edit($id){
        $subCategoryById = SubCategory::find($id);
        return response()->json(['subCategoryById' => $subCategoryById]);
    }

    public function update(Request $request, SubCategory $category, $id){
        // dd($request->all());
        $category = SubCategory::find($id);
        $category->cat_id = $request->cat_id;
        $category->sub_cat_name = $request->sub_cat_name;
        $category->save();
        return response()->json(['success' => true]);
    }



    public function formValidation(Request $request){
        $request->validate([
            'cat_id' => 'required',
            'sub_cat_name' => 'required',
        ]);
    }

    public function delete(SubCategory $category, $id){
        SubCategory::destroy($id);
        return response()->json(['success' => true]);
    }
}
