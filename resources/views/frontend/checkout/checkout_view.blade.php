@extends('frontend.main_master')
@section('content')

@section('title')
Checkout
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb --> 
<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login -->			
				<div class="col-md-6 col-sm-6 already-registered-login">
					<h4 class="checkout-subtitle"><B>Livrare</b>: </h4>

					<form class="register-form" action="{{ route('checkout.store') }}" method="POST">
                        @csrf
						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Țară <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input"  name="shipping_country" placeholder="">
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Județ <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input"  name="shipping_judet" placeholder="">
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Oraș <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input"  name="shipping_city" placeholder="">
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Adresă <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input"  name="shipping_address" placeholder="">
					  </div>



				</div>	
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
                <h4 class="checkout-subtitle"><B>Date personale</b>: </h4>

						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Nume și Prenume <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input"  name="shipping_name" placeholder="">
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">E-mail <span>*</span></label>
					    <input type="email" class="form-control unicase-form-control text-input"  name="shipping_email" placeholder="">
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Telefon <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" name="shipping_phone" placeholder="">
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Cod Poștal <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input"  name="post_code" placeholder="">
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Observații <span>*</span></label>
					    <textarea class="form-control"  name="notes" placeholder=""></textarea>
					  </div>
					


				</div>	

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					    
					  	
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
                    @foreach($carts as $item)
					<li> 
                        <strong> </strong>
                        <img src="{{ asset($item->options->image) }}" style="height:80px; width:80px;">
                    </li>
                    <li> 
                        <strong> Qty: </strong>
                        ( {{$item->qty}} )
                        <strong> Size: </strong>
                        {{$item->options->size}}
                        <strong> Color: </strong>
                        {{$item->options->color}}

                    </li>
                    <hr>
                    @endforeach
                    <li>
                        <strong> Total: </strong>{{ $cartTotal }} EUR
                        
                    </li>
				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>


<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Select payment method:</h4>
		    </div>

		    <div class="row">
                    <div class="col-md-4">
                        <laber for=""> Stripe </label>
                        <input type="radio" name="payment_method" value="stripe">
                        <img src="{{ asset('frontend/assets/images/payments/4.png')}}">
                    </div>

			</div>
            <Hr>
            <button type="submit" class="btn-upper btn btn-primary checkout-page-button" style="background-color:black; color:white; border-radius: 5px; margin-top: 10px;"> Pay </button>

		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>

</form>


			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ===	-->
</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection