@extends ('frontend.main_master')
@section('content')


<div class="body-content">
    <div class="container">
        <div class="row" style="margin-top: 50px">
            <div class="col-md-2">
                <img class="card-img-top" style="border-radius: 50%" src="{{(!empty($user->profile_photo_path))?
                                url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" alt="User Avatar"
                                height="100%" width="100%">
                                <ul class="list-group list-group-flush">
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block" style="margin-top:50px; background: #000000; border-radius: 10px;">Home</a>
                                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block" style="background: #000000; border-radius: 10px;">Edit Profile</a>
                                    <a href="" class="btn btn-primary btn-sm btn-block" style="background: #000000; border-radius: 10px;">Change Password</a>
                                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block" style="border-radius: 10px;">Logout</a>
                                </ul>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                    <div>
                        
                        <h3 class="text-center">
                        Change your password below:</h3>
                        <br>
                        <div class="card-body">
                            <form method="post" action="{{ route('user.password.update') }}" >
                                @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Current Password <span>:</span></label>
                                <input type="password" id="current_password"name="oldpassword" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">New Password <span>:</span></label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Confirm Password <span>:</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger"> Update </button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    <div>
</div>
            
@endsection