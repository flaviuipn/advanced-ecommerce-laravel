<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.product.product_add', compact('categories','subsubcategories'));
    }
    public function ProductStore(Request $request){
        // am facut toate select/input typeurile required pentru a salva timp aici sa nu fie nevoie de multa munca
        $image = $request->file('product_thumbnail');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,500)->save('upload/products/thumbnail/'.$name_gen);
        $save_url='upload/products/thumbnail/'.$name_gen;

        $product_id=Product::insertGetId([
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'subsubcategory_id' => $request->subsubcategory_id,

		'product_name_en' => $request->product_name_en,
		'product_name_ro' => $request->product_name_ro,
		'product_slug_en' => strtolower(str_replace(' ', '-',$request->product_name_en)),
		'product_slug_ro' => str_replace(' ', '-',$request->product_name_ro),
        'product_code' => $request->product_code,
        'product_qty' => $request->product_qty,
        'product_size_en' => $request->product_size_en,
        'product_color_en' => $request->product_color_en,
        'product_color_ro' => $request->product_color_ro,

        'selling_price' => $request->selling_price,
        'discount_price' => $request->discount_price,
        'selling_price_ro' => $request->selling_price_ro,
        'discount_price_ro' => $request->discount_price_ro,
        'short_descp_en' => $request->short_descp_en,
        'short_descp_ro' => $request->short_descp_ro,

        'hot_deals' => $request->hot_deals,
        'special_offer' => $request->special_offer,
        'featured' => $request->featured,
        'new_arrivals' => $request->new_arrivals,
        'status' => 1,
        'product_thumbnail' => $save_url,
        'created_at' => Carbon::now(),

        ]);
        
    //multiple image upload start
    $images = $request->file('multi_img');
    foreach ($images as $img) {
        $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(500,500)->save('upload/products/multi_image/'.$make_name);
        $uploadPath='upload/products/multi_image/'.$make_name;

    MultiImg::insert([
            'product_id' => $product_id,
            'photo_name' => $uploadPath,
            'created_at' => Carbon::now(),
    ]);    
    //end
    }
    $notification = array(
        'message' => 'Product Inserted Successfully!',
        'alert-type' => 'success'
    );
    return redirect()->route('manage-product')->with($notification);
}
    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }

    public function EditProduct($id){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id); //specific data query
        $multiImgs = MultiImg::where('product_id',$id)->get();
    	return view('backend.product.product_edit',compact('categories','subcategories', 'subsubcategories', 'products','multiImgs'));

    }

    public function ProductDataUpdate(Request $request){
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
    
            'product_name_en' => $request->product_name_en,
            'product_name_ro' => $request->product_name_ro,
            'product_slug_en' => strtolower(str_replace(' ', '-',$request->product_name_en)),
            'product_slug_ro' => str_replace(' ', '-',$request->product_name_ro),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_size_en' => $request->product_size_en,
            'product_color_en' => $request->product_color_en,
            'product_color_ro' => $request->product_color_ro,
    
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'selling_price_ro' => $request->selling_price_ro,
            'discount_price_ro' => $request->discount_price_ro,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ro' => $request->short_descp_ro,
    
            'hot_deals' => $request->hot_deals,
            'special_offer' => $request->special_offer,
            'featured' => $request->featured,
            'new_arrivals' => $request->new_arrivals,
            'status' => 1,
            
            'created_at' => Carbon::now(),
    
            ]);
            $notification = array(
                'message' => 'Product Updated without Image successfully!',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-product')->with($notification);
    }
    public function MultiImageUpdate(Request $request){
        $imgs = $request->multi_img;
        foreach($imgs as $id => $img){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(500,500)->save('upload/products/multi_image/'.$make_name);
            $uploadPath='upload/products/multi_image/'.$make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
    }
    $notification = array(
        'message' => 'Product images Updated successfully!',
        'alert-type' => 'info'
    );
    return redirect()->back()->with($notification);
}

public function ThumbnailUpdate(Request $request){
        $product_id = $request->id;
        $tmbDel = $request->old_img;
        unlink($tmbDel);
        $thumb = $request->file('product_thumbnail');
        $name_gen=hexdec(uniqid()).'.'.$thumb->getClientOriginalExtension();
        Image::make($thumb)->resize(500,500)->save('upload/products/thumbnail/'.$name_gen);
        $save_url='upload/products/thumbnail/'.$name_gen;

        Product::findOrFail($product_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);
$notification = array(
    'message' => 'Product thumbnail Updated successfully!',
    'alert-type' => 'info'
);
return redirect()->back()->with($notification);
}

public function MultiImageDelete($id){
    $oldImg = MultiImg::findOrFail($id);
    unlink($oldImg->photo_name);
    MultiImg::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Product images Updated successfully!',
        'alert-type' => 'success'
    );
return redirect()->back()->with($notification);
}

public function ProductInactive($id){
    Product::findOrFail($id)->update([
        'status' => 0
    ]);
    
    $notification = array(
        'message' => 'Product now Inactive!',
        'alert-type' => 'info'
    );
return redirect()->back()->with($notification);
}

public function ProductActive($id){
    Product::findOrFail($id)->update([
        'status' => 1
    ]);
    
    $notification = array(
        'message' => 'Product now Active!',
        'alert-type' => 'success'
    );
return redirect()->back()->with($notification);
}

public function ProductDelete($id){
    $product = Product::findOrFail($id);
    unlink($product->product_thumbnail);
    Product::findOrFail($id)->delete();
    $images = MultiImg::where('product_id', $id)->get();
    foreach($images as $img){
        unlink($img->photo_name);
        MultiImg::where('product_id', $id)->delete();
    }
    $notification = array(
        'message' => 'Product Deleted!',
        'alert-type' => 'info'
    );
return redirect()->back()->with($notification);
}
}