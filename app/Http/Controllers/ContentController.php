<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Content;

class ContentController extends Controller
{

    public function index(){
        $contentList = Content::with('categories','sub_categories')->get();
        return response()->json(['contentList' => $contentList],200);
    }

    public function getSubCategoryByCatId($id) {
        // dd($id);
        $subCategoryList = SubCategory::where('cat_id',$id)->with('categories')->get();
        return response()->json(['subCategoryList' =>$subCategoryList],200);
    }

    public function store(Request $request){
        // dd($request->all());

        $this->formValidation($request);
        $file_url = '';
        if($request->file != ''){
            $uploadPath = public_path('contentImages/');
            $fileName = $request->file->getClientOriginalName();
            $newFileName = time().'.'.$request->file->getClientOriginalExtension();
            $file_url = $newFileName;
            $request->file->move($uploadPath, $newFileName);
        }
        $content = new Content();
        $content->category_id = $request->cat_id;
        $content->subCategory_id = $request->sub_cat_id;
        $content->title = $request->title;
        $content->details = $request->details;
        $content->vedioUrl = $request->vedioUrl;
        $content->file = $file_url;
        $content->save();
        return response()->json(['success'=>true]);
    }
    
    public function edit($id){
        $content = Content::find($id);
        return response()->json(['contentById' => $content]);
    }

    public function update(Request $request, Content $content, $id){
        // dd($request->all());
        $this->formValidation($request);

        $content = Content::find($id);

        $file_url = '';
        if($request->file != ''){
            $uploadPath = public_path('contentImages/');
            $fileName = $request->file->getClientOriginalName();
            $newFileName = time().'.'.$request->file->getClientOriginalExtension();
            $file_url = $newFileName;
            $request->file->move($uploadPath, $newFileName);
        }
        // $content = new Content();
        $content->category_id = $request->cat_id;
        $content->subCategory_id = $request->sub_cat_id;
        $content->title = $request->title;
        $content->details = $request->details;
        $content->vedioUrl = $request->vedioUrl;
        $content->save();
        return response()->json(['success'=>true]);
    }

    public function delete($id){
        // dd($id);
        $content = Content::find($id);
        if($content->file != ''){
            $path = public_path('/contentImages/'.$content->file);
            unlink($path); 
        }
        $content->delete();
    }

    public function formValidation(Request $request){
        $request->validate([
            'cat_id' => 'required',
            'sub_cat_id' => 'required',
            'title' => 'required',
        ]);
    }
}
