@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Subcategory List <span class="badge badge-pill badge-danger" style="margin-left: 15px"> {{ count($subcategory) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category name:</th>
								<th>Subcategory english name:</th>
								<th>Subcategory romanian name: </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($subcategory as $item)
	 <tr>
		<td> {{ $item['category']['category_name_en'] }} </td>
		<td>{{ $item->subcategory_name_eng }}</td>
		<td>{{ $item->subcategory_name_ro }}</td>
		<td >
 <a href="{{ route('subcategory.edit',$item->id) }}" class="btn btn-info" title="Edit Data" style="margin-left: 15px; margin-right: 30px;"><i class="fa fa-pencil"></i> </a>
 <a href="{{ route('subcategory.delete',$item->id) }}" class="btn btn-danger" title="Delte Data"><i class="fa fa-trash"></i> </a>
		</td>
							 
	 </tr>
	  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->


<!--   ------------ Add Category Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add subcategory below: </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('subcategory.store') }}" >
	 	@csrf
					   
            <div class="form-group">
								<h5>Category select <span class="text-danger">:</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
										<option value="">Select Category</option>
                                        @foreach($categories as $category) <!-- o sa pot vedea toate categoriile bagate in category de mine-->
										<option value="{{$category->id}}">{{ $category->category_name_en }}</option>
                                        @endforeach
									</select>
                                    @error('category_id') 
	                                    <span class="text-danger">{{ $message }}</span>
	                                @enderror 
								</div>
	            </div>


	<div class="form-group">
		<h5>Subcategory english name <span class="text-danger">:</span></h5>
		<div class="controls">
	 <input type="text" name="subcategory_name_eng" class="form-control" >
     @error('subcategory_name_eng') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>


	<div class="form-group">
		<h5>Subcategory romanian name <span class="text-danger">:</span></h5>
		<div class="controls">
	 <input type="text" name="subcategory_name_ro" class="form-control" >
     @error('subcategory_name_ro') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add">					 
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