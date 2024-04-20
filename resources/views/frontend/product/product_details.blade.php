
@extends ('frontend.main_master')
@section('content')

@section('title')
    {{ $product->product_name_en }}
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Clothing</a></li>
				<li class='active' style="color: #d9534f">@if (session()->get('language')=='ro') {{$product->product_name_ro}} @else {{$product->product_name_en}} @endif </li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				<div class="home-banner outer-top-n">
<img src="{{ asset('frontend/assets/images/banners/app.png') }} " alt="Image">
</div>						

<!-- ============================================== NEWSLETTER ============================================== -->
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
	<h3 class="section-title">Newsletters</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<p>Sign Up for Our Newsletter!</p>
        <form>
        	 <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
			  </div>
			  <button class="btn btn-primary" style="background-color: black; color: white;">Subscribe</button>
		</form>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->


 

				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">

        @foreach($multiImg as $img)
            <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                <a data-lightbox="image-1" data-title="Gallery" href="{{asset($img->photo_name)}}">
                    <img class="img-responsive" alt="" src="{{asset($img->photo_name)}}" data-echo="{{asset($img->photo_name)}}" />
                </a>
            </div><!-- /.single-product-gallery-item -->
            @endforeach
        </div><!-- /.single-product-slider -->



        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
                @foreach($multiImg as $img)
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{ $img->id }}">
                        <img class="img-responsive" width="85" alt="" src="{{asset($img->photo_name)}}" data-echo="{{asset($img->photo_name)}}" />
                    </a>
                </div>
                @endforeach
            </div><!-- /#owl-single-product-thumbnails -->

            

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<button type="button" class="close" aria-label="Close" id="closeModel">
							<span aria-hidden="true">&times;</span>
						</button>
						<div class="product-info">
							<h1 class="name" id="pname">@if (session()->get('language')=='ro') {{$product->product_name_ro}} @else {{$product->product_name_en}} @endif </h1>


							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">@if (session()->get('language')=='ro') Disponibilitate: @else Availability: @endif</span>
										</div>	
									</div>
                                    <br>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value"> {{ $product->product_qty }}</span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
                            @if (session()->get('language')=='ro') {{$product->short_descp_ro}} @else {{$product->short_descp_en}} @endif 
							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											<span class="price"> @if ($product->discount_price==NULL) {{ $product->selling_price }}EUR @else {{ $product->discount_price }}EUR @endif</span>
											<span class="price-strike">@if($product->discount_price!=NULL) {{ $product->selling_price }}EUR @endif </span>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>

										</div>
									</div>

								</div><!-- /.row -->
								<!-- Product color & size -->
								<div class="row">
								<div class="col-sm-6">
										<div class="form-group">
											<label class="info-title control-label">@if (session()->get('language')=='ro') Culoare @else Color @endif <span></span></label>
											<select class="form-control unicase-form-control selectpicker" id="color">
												<option selected="" disabled="" value="{{ $color_en }}"> @if (session()->get('language')=='ro') {{$color_ro}} @else {{$color_en}} @endif</option>
												
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="info-title control-label"> @if (session()->get('language')=='ro') Mărime @else Size @endif<span></span></label>
											<select class="form-control unicase-form-control selectpicker" id="size">
												<option selected="" disabled="">@if (session()->get('language')=='ro') Selectează mărimea @else - Select size - @endif</option>
												@foreach ($product_size_en as $size)
												<option value="{{ $size }}">{{ $size }}</option>
												@endforeach

											</select>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->
							<br><br>
							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">@if (session()->get('language')=='ro') Cantitate: @else Quantity: @endif</span>
									</div>
									
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" id="qty" value="1">
							              </div>
							            </div>
									</div>
									<input type="hidden" id="product_id" value="{{ $product->id }}" min="1">
									<div class="col-sm-7">
										<button type="submit"  onclick="addToCart()" class="btn btn-primary"  style="background-color: black"><i class="fa fa-shopping-cart inner-right-vs"></i>@if (session()->get('language')=='ro') ADAUGĂ ÎN COȘ @else ADD TO CART @endif </button>
									</div>
								</form>	
								
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->
							<br><br><br>
							

							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
			

								

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->
@endsection