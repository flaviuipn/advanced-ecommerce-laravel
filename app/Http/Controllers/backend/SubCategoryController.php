<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
Use App\Models\Category;
Use App\Models\SubSubCategory;
class SubCategoryController extends Controller
{
    //
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();//luam din tabel in ordine crescatoare in fct de eng name data si o pasam in compact
        $subcategory = SubCategory::latest()->get(); // all the latest data cu variabila
        return view('backend.category.subcategory_view', compact('subcategory','categories'));
    }

    public function SubCategoryStore(Request $request){
        

    	$request->validate([
            'category_id' => 'required',
    		'subcategory_name_eng' => 'required',
    		'subcategory_name_ro' => 'required',
    		
    	],[
    		'category_id.required' => 'Select an option!',
    		'subcategory_name_eng.required' => 'Input subcategory English Name',
    	]);

	subcategory::insert([
        'category_id' => $request->category_id,
		'subcategory_name_eng' => $request->subcategory_name_eng,
		'subcategory_name_ro' => $request->subcategory_name_ro,
		'subcategory_slung_eng' => strtolower(str_replace(' ', '-',$request->subcategory_name_eng)),
		'subcategory_slung_ro' => str_replace(' ', '-',$request->subcategory_name_ro),
		

    	]);

	    $notification = array(
			'message' => 'Subcategory Inserted Successfully!',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
    	$subcategory = SubCategory::findOrFail($id);
    	return view('backend.category.subcategory_edit',compact('subcategory','categories'));

    }
    public function SubCategoryUpdate(Request $request){
        $subcat_id = $request->id;
        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_eng' => $request->subcategory_name_eng,
            'subcategory_name_ro' => $request->subcategory_name_ro,
            'subcategory_slung_eng' => strtolower(str_replace(' ', '-',$request->subcategory_name_eng)),
            'subcategory_slung_ro' => str_replace(' ', '-',$request->subcategory_name_ro),
            
    
            ]);
    
            $notification = array(
                'message' => 'Subcategory Updated Successfully!',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
            
        $notification = array(
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    //admin sub sub category:

    public function SubSubCategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();//luam din tabel in ordine crescatoare in fct de eng name data si o pasam in compact
        $subsubcategory = SubSubCategory::latest()->get(); // all the latest data cu variabila
        return view('backend.category.sub_subcategory_view', compact('subsubcategory','categories'));
    }

    public function GetSubCategory($category_id){
            $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_eng', 'ASC')->get();
            return json_encode($subcat);
    }
    public function SubSubCategoryStore(Request $request){
        

    	$request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
    		'subsubcategory_name_eng' => 'required',
    		'subsubcategory_name_ro' => 'required',
    		
    	],[
    		'category_id.required' => 'Select an option!',
    		'subsubcategory_name_eng.required' => 'Input subsubcategory English Name',
    	]);

	SubSubcategory::insert([
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
		'subsubcategory_name_eng' => $request->subsubcategory_name_eng,
		'subsubcategory_name_ro' => $request->subsubcategory_name_ro,
		'subsubcategory_slung_eng' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_eng)),
		'subsubcategory_slung_ro' => str_replace(' ', '-',$request->subsubcategory_name_ro),
		

    	]);

	    $notification = array(
			'message' => 'SUB Subcategory Inserted Successfully!',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_eng', 'ASC')->get();
    	$subsubcategories = SubSubCategory::findOrFail($id);
    	return view('backend.category.sub_subcategory_edit',compact('categories','subcategories', 'subsubcategories'));

    }
    public function SubSubCategoryUpdate(Request $request){
        $subsubcat_id = $request->id;
        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_eng' => $request->subsubcategory_name_eng,
            'subsubcategory_name_ro' => $request->subsubcategory_name_ro,
            'subsubcategory_slung_eng' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_eng)),
            'subsubcategory_slung_ro' => str_replace(' ', '-',$request->subsubcategory_name_ro),
            
    
            ]);
    
            $notification = array(
                'message' => 'subSubcategory Updated Successfully!',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function SubSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();
            
        $notification = array(
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


}
