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
                        Welcome to YEKIX - Nike Men Resell Store! </h3>
                        <h4 style="margin-top:30px;">Fun fact:</h4><h3><b>Nike’s Slogan Originated From a Killer</b></h3>
<span style="font-size: 15px">“Just do it” has been a famous slogan that Nike has been using for many years now.
     But most people probably did not know that its origins stemmed from Gary Gilmore, who was executed for two murders in 1977. When asked for any final words prior to his execution, Gilmore simply replied, “Let’s do it.” Dan Wieden, the founder of Wieden+Kennedy advertising agency, used this quote as inspiration to launch the “Just Do It” campaign in 1988. Utilizing that campaign, Nike was able to greatly increase its market share in North America over the next decade.</span>
                    </div>
            </div>
        </div>
    <div>
</div>
            
@endsection