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
                                    <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block" style="background: #000000; border-radius: 10px;">Change Password</a>
                                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block" style="border-radius: 10px;">Logout</a>
                                </ul>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                    <div>
                        
                        <h3 class="text-center"><span class="text-danger"> Hi, </span><strong>{{Auth::user()->name}}</strong>!<br>
                        Update your profile below:</h3>
                        <div class="card-body">
                            <form method="post" action="{{ route('user.profile.store') }}" 
                            enctype="multipart/form-data">
                                @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Name <span>:</span></label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}"> <!-- apare in formular numele din db -->
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>:</span></label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Profile Picture <span>:</span></label>
                                <input type="file" name="profile_photo_path" class="form-control" >
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