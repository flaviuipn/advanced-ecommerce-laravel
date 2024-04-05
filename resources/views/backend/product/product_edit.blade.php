@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="container-full">
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update an existing product below:</h4>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('product-update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $products->id }}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Category select <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control" required="">
                                                        <option value="" selected disabled>Select category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected' : '' }}>
                                                                {{ $category->category_name_en }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Subcategory select <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control" required="">
                                                        <option value="" selected disabled>Select subcategory</option>
                                                        @foreach($subcategories as $subcategory)
                                                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $products->subcategory_id ? 'selected' : '' }}>
                                                                {{ $subcategory->subcategory_name_eng }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Sub-subcategory select <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <select name="subsubcategory_id" class="form-control" required="">
                                                        <option value="" selected disabled>Select sub-subcategory</option>
                                                        @foreach($subsubcategories as $subsubcategory)
                                                            <option value="{{ $subsubcategory->id }}" {{ $subsubcategory->id == $products->subsubcategory_id ? 'selected' : '' }}>
                                                                {{ $subsubcategory->subsubcategory_name_eng }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('subsubcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product name ENG <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_en" class="form-control" required="" value="{{ $products->product_name_en }}">
                                                </div>
                                                @error('product_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product name RO <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_ro" class="form-control" required="" value="{{ $products->product_name_ro }}">
                                                </div>
                                                @error('product_name_ro')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product code <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_code" class="form-control" required="" value="{{ $products->product_code }}">
                                                </div>
                                                @error('product_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product quantity <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_qty" class="form-control" required="" value="{{ $products->product_qty }}">
                                                </div>
                                                @error('product_qty')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product color ENG <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_color_en" class="form-control" required="" value="{{ $products->product_color_en }}">
                                                </div>
                                                @error('product_color_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product color RO <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_color_ro" class="form-control" required="" value="{{ $products->product_color_ro }}">
                                                </div>
                                                @error('product_color_ro')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product size <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_size_en" class="form-control" required="" data-role="tagsinput" value="{{ $products->product_size_en }}">
                                                </div>
                                                @error('product_size_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product selling price EUR<span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="selling_price" class="form-control" required="" value="{{ $products->selling_price }}">
                                                </div>
                                                @error('selling_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product discounted selling price EUR<span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_price" class="form-control" value="{{ $products->discount_price}}">
                                                </div>
                                                @error('discount_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product selling price RO<span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="selling_price_ro" class="form-control" required="" value="{{ $products->selling_price_ro }}">
                                                </div>
                                                @error('selling_price_ro')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product discounted selling price RO<span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_price_ro" class="form-control" value="{{ $products->discount_price_ro}}">
                                                </div>
                                                @error('discount_price_ro')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short description ENG <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_descp_en" id="textarea" class="form-control" required=""> {{ $products->short_descp_en }}</textarea>
                                                </div>
                                                @error('short_descp_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short description RO <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_descp_ro" id="textarea" class="form-control" required=""> {{ $products->short_descp_ro }}</textarea>
                                                </div>
                                                @error('short_descp_ro')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="controls" style="margin-left:20px;margin-top:15px;margin-bottom:15px;">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_2" name="new_arrivals"  value="1" {{ $products->new_arrivals == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_2">New arrivals?</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $products->featured == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_3">Featured?</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls" style="margin-left:20px;margin-top:15px;margin-bottom:15px;">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $products->special_offer == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_4">Special offer?</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_5" name="hot_deals" value="1" {{ $products->hot_deals == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox5">Hot deals?</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update data" style="margin-left: 5px;">
                                    </div>
                                </div>
                            </div>
                            <br><hr><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">{{$products->product_name_en}} thumbnail <strong>update</strong>:</h4>
                    </div>
                    <form method="post" action="{{route('update-product-thumbnail')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$products->id}}">
                    <input type="hidden" name="old_img" value="{{$products->product_thumbnail}}">
                        <div class="row row-sm">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{asset($products->product_thumbnail)}}" class="card-img-top" style="height:400px;width:500px;margin-left:20px;margin-top:20px;margin-bottom:15px;">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change thumbnail:</label>
                                                    <input type="file" name="product_thumbnail" class="form-control"
                                                    onChange="mainThumbUrl(this)">
                                                    <img src="" id="mainThumb" style="margin-top:20px; border-radius: 5px;">
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="text-xs-right" style="margin-bottom: 30px;">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update images" style="margin-left: 30px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">{{$products->product_name_en}} multiple images <strong>update</strong>:</h4>
                    </div>
                    <form method="post" action="{{route('update-product-image')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="row row-sm">
                            @foreach($multiImgs as $img)
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{asset($img->photo_name)}}" class="card-img-top" style="height:400px;width:500px;margin-left:20px;margin-top:20px;margin-bottom:15px;">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{route('product.multiimg.delete',$img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa-solid fa-trash"></i></a>
                                            </h5>
                                            <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image:</label>
                                                    <input type="file" class="form-control" name="multi_img[{{ $img->id }}]">
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-xs-right" style="margin-bottom: 30px;">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update images" style="margin-left: 30px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_eng + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

<script type="text/javascript">
    function mainThumbUrl(input){
        if (input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThumb').attr('src', e.target.result).width(100).height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    $(document).ready(function(){
        $('#multiImg').on('change', function(){ //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data
                
                $.each(data, function(index, file){ //loop though each file
                    if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80).height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
            }else{
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>

@endsection
