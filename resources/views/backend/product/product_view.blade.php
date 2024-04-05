@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Manage products below: <span class="badge badge-pill badge-danger" style="margin-left: 15px"> {{ count($products) }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Thumbnail: </th>
								<th>Product name:</th>
                                <th>Price EU: </th>
								<th>Price RO: </th>
								<th>Discount: </th>
                                <th>Quantity: </th>
								<th>Size available: </th>
								<th>Status: </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($products as $item)
	 <tr>
		<td> <img src="{{ asset($item->product_thumbnail) }}" style="width:120px; height:75px;"> </td>
		<td>{{ $item->product_name_en }}</td>
        <td>{{ $item->selling_price }} EUR</td>
		<td>{{ $item->selling_price_ro }} RON</td>
		<td> 
		 	@if($item->discount_price == NULL)
		 	<span class="badge badge-pill badge-danger">No Discount</span>

		 	@else
		 	@php
		 	$amount = $item->selling_price - $item->discount_price;
		 	$discount = ($amount/$item->selling_price) * 100;
		 	@endphp
           <p class="badge badge-pill badge-danger">{{ round($discount)  }} %</p>
		   <p> {{$item->discount_price}} EUR</p>
		   <p> {{$item->discount_price_ro}} RON</p>
		 	@endif



		 </td>
        <td>{{ $item->product_qty }} pieces</td>
		<td>{{ $item->product_size_en }}</td>
		<td>
			@if($item->status == 1)
				<span class="badge badge-pill badge-success">Active</span>
			@else
				<span class="badge badge-pill badge-danger">Inactive</span>
			@endif
		</td>
		<td >
		<a href="{{ route('product.edit',$item->id) }}" class="btn btn-primary" title="Details" style="margin-left: 15px;margin-right: 15px;"><i class="fa-solid fa-circle-info"></i> </a>
 <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info" title="Edit" style="margin-right: 15px;"><i class="fa fa-pencil"></i> </a>
 <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger" title="Delete" id="delete"><i class="fa fa-trash"></i> </a>

 @if($item->status == 1)
<a href="{{ route('product.inactive',$item->id) }}" class="btn btn-danger" title="Inactive" style="margin-left: 15px;"><i class="fa-solid fa-arrow-down"></i> </a>
			@else
<a href="{{ route('product.active',$item->id) }}" class="btn btn-success" title="Active" style="margin-left: 15px;"><i class="fa-solid fa-arrow-up"></i> </a>
			@endif
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

@endsection