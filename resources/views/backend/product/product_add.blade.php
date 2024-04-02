@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="container-full">
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Product Below:</h4>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('product-store') }}" enctype="multipart/form-data">
                            @csrf
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
                                                        <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
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
                                                            <option value="{{ $subsubcategory->id }}">{{ $subsubcategory->subsubcategory_name_eng }}</option>
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
                                                    <input type="text" name="product_name_en" class="form-control" required="">
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
                                                    <input type="text" name="product_name_ro" class="form-control" required="">
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
                                                    <input type="text" name="product_code" class="form-control" required="" >
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
                                                    <input type="text" name="product_qty" class="form-control" required="">
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
                                                    <input type="text" name="product_color_en" class="form-control" required="">
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
                                                    <input type="text" name="product_color_ro" class="form-control" required="">
                                                </div>
                                                @error('product_color_ro')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product size <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_size_en" class="form-control" required="" data-role="tagsinput">
                                                </div>
                                                @error('product_size_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product selling price <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="selling_price" class="form-control" required="">
                                                </div>
                                                @error('selling_price')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product discounted selling price <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_price" class="form-control" required="">
                                                </div>
                                                @error('discount_price')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short description ENG <span class="text-danger">:</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_descp_en" id="textarea" class="form-control" required=""></textarea>
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
                                                    <textarea name="short_descp_ro" id="textarea" class="form-control" required=""></textarea>
                                                </div>
                                                @error('short_descp_ro')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product main thumbnail <span class="text-danger">:</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="product_thumbnail" class="form-control"
                                                        onChange="mainThumbUrl(this)" required="">
                                                    </div>
                                                    @error('product_thumbnail')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <img src="" id="mainThumb" style="margin-top:15px; border-radius: 5px;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product multiple images <span class="text-danger">:</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" required="">
                                                    </div>
                                                    @error('multi_img')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div class="row" id="preview_img">

                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><hr><br>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_2" name="new_arrivals" value="1">
                                                <label for="checkbox_2">New arrivals?</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                                <label for="checkbox_3">Featured?</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                                <label for="checkbox_4">Special offer?</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_5" name="hot deals" value="1">
                                                <label for="checkbox5">Hot deals?</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add" style="margin-left: 30px;">
                            </div>
                        </form>
                    </div>
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
                        url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
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
                            var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                        .height(80); //create image element 
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
