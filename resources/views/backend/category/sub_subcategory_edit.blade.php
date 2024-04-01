@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		  

<!--   ------------ Add Sub SubCategory Page -------- -->


          <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Update an existing sub-subcategory: </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


                    <form method="post" action="{{ route('subsubcategory.update') }}" >
	 	@csrf
			<input type="hidden" name="id" value="{{ $subsubcategories->id }}">		   
            <div class="form-group">
								<h5>Category select <span class="text-danger">:</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
										<option value="">Select Category</option>
                                        @foreach($categories as $category) <!-- o sa pot vedea toate categoriile bagate in category de mine-->
										<option value="{{$category->id}}"
                                         {{ $category->id==$subsubcategories->category_id ? 'selected' :''}}>{{ $category->category_name_en }}</option>
                                        @endforeach
									</select>
                                    @error('category_id') 
	                                    <span class="text-danger">{{ $message }}</span>
	                                @enderror 
								</div>
	            </div>
            <div class="form-group">
								<h5>Subcategory select <span class="text-danger">:</span></h5>
								<div class="controls">
									<select name="subcategory_id" class="form-control">
										<option value="">Select SubCategory</option>
                                        @foreach($subcategories as $subsub) <!-- o sa pot vedea toate categoriile bagate in category de mine-->
										<option value="{{$subsub->id}}"
                                         {{ $subsub->id==$subsubcategories->subcategory_id ? 'selected' :''}}>{{ $subsub->subcategory_name_eng }}</option>
                                        @endforeach
									</select>
                                    @error('category_id') 
	                                    <span class="text-danger">{{ $message }}</span>
	                                @enderror 
								</div>
	            </div>

    <div class="form-group">
		<h5>Sub-subcategory ENG name <span class="text-danger">:</span></h5>
		<div class="controls">
	 <input type="text" name="subsubcategory_name_eng" class="form-control" value="{{ $subsubcategories->subsubcategory_name_eng }}" >
     @error('subsubcategory_name_eng')                                             <!-- ^ ^ definite in metoda din subcategory controller de edit-->
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>	 

    <div class="form-group">
		<h5>Sub-subcategory RO name <span class="text-danger">:</span></h5>
		<div class="controls">
	 <input type="text" name="subsubcategory_name_ro" class="form-control" value="{{ $subsubcategories->subsubcategory_name_ro }}" >
     @error('subsubcategory_name_ro')                                               <!-- ^ ^ definite in metoda din subcategory controller de edit-->
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div> 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
						</div>
					</form>




					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection