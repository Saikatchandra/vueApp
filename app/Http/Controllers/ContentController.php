<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;

class ContentController extends Controller
{
    public function getSubCategoryByCatId($id) {
        // dd($id);
        $subCategoryList = SubCategory::where('cat_id',$id)->with('categories')->get();
        return response()->json(['subCategoryList' =>$subCategoryList],200);
    }

    public function store(Request $request){
        dd($request->all());
    }
}
