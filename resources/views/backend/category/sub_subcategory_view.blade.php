@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Sub-subcategory List <span class="badge badge-pill badge-danger" style="margin-left: 15px"> {{ count($subsubcategory) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category: </th>
								<th>Subcategory: </th>
                                <th>Sub-subcategory ENG name: </th>
								<th>Sub-subcategory RO name: </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($subsubcategory as $item)
	 <tr>
		<td> {{ $item['category']['category_name_en'] }} </td>
        <td> {{ $item['subcategory']['subcategory_name_eng'] }} </td>
		<td>{{ $item->subsubcategory_name_eng }}</td>
		<td>{{ $item->subsubcategory_name_ro }}</td>
		<td >
 <a href="{{ route('subsubcategory.edit',$item->id) }}" class="btn btn-info" title="Edit Data" style="margin-left: 15px; margin-right: 30px;"><i class="fa fa-pencil"></i> </a>
 <a href="{{ route('subsubcategory.delete',$item->id) }}" class="btn btn-danger" title="Delte Data"><i class="fa fa-trash"></i> </a>
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
				  <h3 class="box-title">Add sub-subcategory below: </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('subsubcategory.store') }}" >
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
								<h5>Subsategory select <span class="text-danger">:</span></h5>
								<div class="controls">
									<select name="subcategory_id" class="form-control">
										<option value="">Select SubCategory</option>
                                        
									</select>
                                    @error('category_id') 
	                                    <span class="text-danger">{{ $message }}</span>
	                                @enderror 
								</div>
	            </div>

	<div class="form-group">
		<h5>Sub-subcategory ENG name <span class="text-danger">:</span></h5>
		<div class="controls">
	 <input type="text" name="subsubcategory_name_eng" class="form-control" >
     @error('subsubcategory_name_eng') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>


	<div class="form-group">
		<h5>Sub-subcategory RO name <span class="text-danger">:</span></h5>
		<div class="controls">
	 <input type="text" name="subsubcategory_name_ro" class="form-control" >
     @error('subsubcategory_name_ro') 
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


@endsection