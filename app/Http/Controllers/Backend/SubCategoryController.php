<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    //
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view',compact('subcategory',
    'categories'));
    }

    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id'=> 'required',
            'subcategory_name_en'=> 'required',
            'subcategory_name_id'=> 'required',
        ],[
            'category_id.required'=> 'Please Select Category Option',
            'subcategory_name_en.required'=> 'Input Category English Name',
            
        ]);

        SubCategory::insert([
            'category_id' => $request-> category_id,
            'subcategory_name_en' => $request-> subcategory_name_en,
            'subcategory_name_id' => $request-> subcategory_name_id,
            'subcategory_slug_en' => strtolower(str_replace('', '-', $request-> subcategory_name_en)),
            'subcategory_slug_id' => str_replace('', '-', $request-> subcategory_name_id),
        ]);    
        $notification = array(
            'message' =>'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::findorFail($id);
        return view('backend.category.subcategory_edit',compact('subcategory',
    'categories'));
    }
    
    public function SubCategoryUpdate(Request $request){
        $subcat_id = $request->id;
        SubCategory::findorFail($subcat_id)->update([
            'category_id' => $request-> category_id,
            'subcategory_name_en' => $request-> subcategory_name_en,
            'subcategory_name_id' => $request-> subcategory_name_id,
            'subcategory_slug_en' => strtolower(str_replace('', '-', $request-> subcategory_name_en)),
            'subcategory_slug_id' => str_replace('', '-', $request-> subcategory_name_id),
        ]);  

        $notification = array(
            'message' =>'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subcategory')->with($notification);
    } // end method

    public function SubCategoryDelete($id){
        SubCategory::findorFail($id)->delete();
        $notification = array(
            'message' =>'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
