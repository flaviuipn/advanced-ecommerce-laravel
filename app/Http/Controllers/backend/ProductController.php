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
    return redirect()->back()->with($notification);
}
}
