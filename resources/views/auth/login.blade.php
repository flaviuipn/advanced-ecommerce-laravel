@extends('frontend.main_master')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">@if (session()->get('language')=='ro') Conectează-te @else Sign in  @endif</h4>
	<p class="">@if (session()->get('language')=='ro') Salut, bine ai revenit! @else Hello, Welcome to your account.@endif</p>


    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
            @csrf
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">E-mail<span>*</span></label>
		    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">@if (session()->get('language')=='ro') Parolă @else Password  @endif<span>*</span></label>
		    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" >
		</div>
		<div class="radio outer-xs">
		  	<label>
		    	<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">@if (session()->get('language')=='ro') Rămân logat!
				@else Remember me! @endif
		  	</label>
		  	<a href="{{ route('password.request') }}" class="forgot-password pull-right">@if (session()->get('language')=='ro') Am uitat parola?
			@else Forgot your Password?  @endif</a>
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">@if (session()->get('language')=='ro') Loghează-te
		  @else Login @endif
		</button>
	</form>		
    
    
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">@if (session()->get('language')=='ro') Creează un cont nou @else  Create a new account @endif</h4>
	<p class="text title-tag-line">@if (session()->get('language')=='ro') Creează contul: @else Create your new account: @endif</p>

	<form method="POST" action="{{ route('register') }}">
            @csrf
        <div class="form-group">
		    <label class="info-title" for="name">@if (session()->get('language')=='ro') Nume @else Name @endif<span>*</span></label>
		    <input type="text" id="name" name="name" class="form-control unicase-form-control text-input">
		</div>
        @error('name')

            <span class="invalid" role="alert">
                <strong> {{ $message }} </strong>
            </span>

        @enderror
		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">E-mail<span>*</span></label>
	    	<input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
	  	</div>
          @error('email')

            <span class="invalid" role="alert">
                <strong> {{ $message }} </strong>
            </span>

        @enderror
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">@if (session()->get('language')=='ro') Parola @else Password @endif<span>*</span></label>
		    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
		</div>
        @error('password')

            <span class="invalid" role="alert">
                <strong> {{ $message }} </strong>
            </span>

        @enderror
         <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">@if (session()->get('language')=='ro') Confirmă parola @else  Confirm Password @endif<span>*</span></label>
		    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input" >
		</div>
        @error('password_confirmation')

            <span class="invalid" role="alert">
                <strong> {{ $message }} </strong>
            </span>

        @enderror
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">@if (session()->get('language')=='ro') Înregistrează-te @else Sign Up @endif</button>
	</form>
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->

        
@endsection