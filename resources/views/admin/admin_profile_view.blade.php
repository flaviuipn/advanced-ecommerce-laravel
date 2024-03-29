@extends('admin.admin_master') <!-- prin comenzile astea avem acces la tot css -->
@section('admin')

<div class="container-full">

		<!-- Main content -->
		<section class="content">
			<div class="row">
            <div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
					  <h2 class="widget-user-username">Current Admin LogIn Info:</h2>
					  <h4>Admin E-mail: {{ $adminData->email}}
                        <br> Admin Name: {{$adminData->name}}</h4>
                      <a href="{{route('admin.profile.edit')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Edit Profile</a>
                    
					</div>
                    <br><br>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="{{(!empty($adminData->profile_photo_path))?
                      url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg')}}" alt="User Avatar">
					</div>
                    <br>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">Active since:</h5>
							<span class="description-text">{{$adminData->created_at}}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
							<h5 class="description-header">Last Updated: </h5>
							<span class="description-text">{{$adminData->updated_at}}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">Verified?</h5>
							<span class="description-text">YES</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>
            </div>
        </section>
		<!-- /.content -->
</div>

@endsection