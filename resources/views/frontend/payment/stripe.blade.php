@extends('frontend.main_master')
@section('content')

@section('title')
Stripe Payment Page 
@endsection

<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
</style>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Stripe</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb --> 




<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">





				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">



		 <li>
		 	
<strong> Total : </strong> {{ $cartTotal }} EUR <hr>

		 </li>



				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->
 </div> <!--  // end col md 6 -->







	<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">@if (session()->get('language')=='ro') Selectează metoda de plată @else Select Payment Method @endif</h4>
		    </div>

            <!----------HTML FROM ------->


<form action="{{ route('stripe.order') }}" method="post" id="payment-form">
                            @csrf
                        <div class="form-row">
                            <label for="card-element">
                                                                    <!-- cu $data pasez in checkoutcontroller informatiile si asa le voi aduce aici-->
                            <input type="hidden" name="name" value="{{$data['shipping_name']}}">
                            <input type="hidden" name="email" value="{{$data['shipping_email']}}">
                            <input type="hidden" name="phone" value="{{$data['shipping_phone']}}">
                            <input type="hidden" name="post_code" value="{{$data['post_code']}}">
                            <input type="hidden" name="country" value="{{$data['shipping_country']}}">
                            <input type="hidden" name="judet" value="{{$data['shipping_judet']}}">
                            <input type="hidden" name="city" value="{{$data['shipping_city']}}">
                            <input type="hidden" name="address" value="{{$data['shipping_address']}}">
                            <input type="hidden" name="notes" value="{{$data['notes']}}">
                            
                            </label>
                             
                            <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <br>
                        <button class="btn btn-primary">@if (session()->get('language')=='ro') Plătește @else Submit Payment @endif</button>
                        </form>



<!----------End HTML FROM ------->



		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->
 </div><!--  // end col md 6 -->







</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- === ===== BRANDS CAROUSEL ==== ======== -->








<!-- ===== == BRANDS CAROUSEL : END === === -->	
</div><!-- /.container -->
</div><!-- /.body-content -->



<!----------Start JavaScript  -------> 
<script type="text/javascript">
    // Create a Stripe client.
var stripe = Stripe('pk_test_51P5RZNRr4JgrtyczbHeeqSiDmJwBEUiPKnvh1SyFhj2jTW71ZVItqfpnl3Pb3KLl2CIU65ZsYtTEJMOaGtWFlxPb00pM1WXBPt');
// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});
// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  // Submit the form
  form.submit();
}
</script>

<!---End JavaScript ------->

@endsection