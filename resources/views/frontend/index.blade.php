
@extends ('frontend.main_master')
@section('guest')

@section('title')
YEKIX
@endsection
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 

        
        <!-- ============================================== HOT DEALS ============================================== -->
        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">@if (session()->get('language')=='ro') produse hot @else hot deals @endif </h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

          @foreach($hot_deals as $product)
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{ $product->product_thumbnail}}" alt=""></a> </div>
                @php
                $amount = $product->selling_price - $product->discount_price;
                $discount = ($amount/$product->selling_price) * 100;
                @endphp
                <div class="sale-offer-tag"><span>{{ round($discount)  }} %<br>
                    off</span></div>
                  <div class="timing-wrapper">
                    

                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
                <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if (session()->get('language')=='ro') {{ $product->product_name_ro }} @else {{ $product->product_name_en }} @endif </a></h3>
                  
                  <div class="product-price"> <span class="price" style="color:black"> @if ($product->discount_price==NULL) {{ $product->selling_price }}EUR @else {{ $product->discount_price }}EUR @endif</span>
                           <span class="price-before-discount">@if($product->discount_price!=NULL) {{ $product->selling_price }}EUR @endif </span> </div>
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
              </div>
            </div>
      @endforeach

          </div>
          <!-- /.sidebar-widget --> 
        </div>
        <!-- ============================================== HOT DEALS: END ============================================== --> 
        
        <!-- ============================================== SPECIAL OFFER ============================================== -->
       
        <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
        <!-- ============================================== PRODUCT TAGS ============================================== -->

        <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
        <!-- ============================================== SPECIAL DEALS ============================================== -->

        <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
        
        
        <!-- ============================================== Testimonials============================================== -->
        
        <!-- ============================================== Testimonials: END ============================================== -->
        
        <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/app.png') }} " alt="Image"> </div>
        <br><br>
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">Newsletter</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>@if (session()->get('language')=='ro') Vrei să fii la curent cu tot? @else Want to be up to date with everything? @endif </p>
            <form>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                @if (session()->get('language')=='ro') <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Abonează-te la newsletter">
                @else
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to newsletter">
                @endif
              </div>
              <button class="btn btn-primary" style="background-color: black; color: white;">Subscribe</button>
            </form>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
      </div>
      <!-- /.sidemenu-holder --> 
      
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            <div class="item" style="background-image: url(frontend/assets/images/sliders/airmaxdn.png);">
              
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
            
            <div class="item" style="background-image: url(frontend/assets/images/sliders/airmaxdn2.png);">
              
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item --> 
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">@if (session()->get('language')=='ro') banii înapoi @else money back @endif</h4>
                    </div>
                  </div>
                  <h6 class="text">@if (session()->get('language')=='ro') 30 de zile la dispozitie pentru retur @else 30 Days Money Back Guarantee @endif</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">@if (session()->get('language')=='ro') transport gratuit @else free shipping @endif</h4>
                    </div>
                  </div>
                  <h6 class="text">@if (session()->get('language')=='ro') Pentru comenzile de peste 199EUR @else On orders over $199 @endif</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">@if (session()->get('language')=='ro') Oferte speciale @else Special offer @endif</h4>
                    </div>
                  </div>
                  <h6 class="text">@if (session()->get('language')=='ro') Discount extra pentru produse @else Extra discount on all items @endif </h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">@if (session()->get('language')=='ro') PRODUSE NOI @else NEW ARRIVALS @endif </h3>

            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
            
            <div class="tab-pane in active" id="all">
              
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
              @foreach($products as $product)
                @if($product->new_arrivals == 1)
                  <div class="item item-carousel">
                    
                    <div class="products">
                      
                      <div class="product">
                        
                        <div class="product-image">

                          <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{ $product->product_thumbnail}}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if (session()->get('language')=='ro') {{ $product->product_name_ro }} @else {{ $product->product_name_en }} @endif </a></h3>
          
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> @if ($product->discount_price==NULL) {{ $product->selling_price }}EUR @else {{ $product->discount_price }}EUR @endif</span>
                           <span class="price-before-discount">@if($product->discount_price!=NULL) {{ $product->selling_price }}EUR @endif </span> </div>
                          <!-- /.product-price --> 

                        </div>
                        <!-- /.product-info -->

                        
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
              @endif
          @endforeach
                  
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane --> 
            
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner1.jpg" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner2.jpg" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">@if (session()->get('language')=='ro') PRODUSE Recomandate @else Featured products @endif </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            
          @foreach($featured as $product)
          @if($product->featured == 1)
                  <div class="item item-carousel">
                    
                    <div class="products">
                      
                      <div class="product">
                        
                        <div class="product-image">

                          <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img  src="{{ $product->product_thumbnail}}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if (session()->get('language')=='ro') {{ $product->product_name_ro }} @else {{ $product->product_name_en }} @endif </a></h3>
          
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> @if ($product->discount_price==NULL) {{ $product->selling_price }}EUR @else {{ $product->discount_price }}EUR @endif</span>
                           <span class="price-before-discount">@if($product->discount_price!=NULL) {{ $product->selling_price }}EUR @endif </span> </div>
                          <!-- /.product-price --> 

                        </div>
                        <!-- /.product-info -->

                        
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
              @endif
            @endforeach
            
            
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/nike-banner.png')}}" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right" style="color: #d9534f;">MEN OUTLET<br>
                      <span class="shopping-needs">@if (session()->get('language')=='ro') Salvează până la 40% @else  Save up to 40% off @endif</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text" style="color:black">HOT</div>
                </div>
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
            
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">@if (session()->get('language')=='ro') Haine @else Clothing @endif </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
          @foreach($prd1 as $prd)
          @if($prd->subcategory_id == 5)
                  <div class="item item-carousel">
                    
                    <div class="products">
                      
                      <div class="product">
                        
                        <div class="product-image">

                          <div class="image"> <a href="{{url('product/details/'.$prd->id.'/'.$prd->product_slug_en)}}"><img  src="{{ $prd->product_thumbnail}}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{url('product/details/'.$prd->id.'/'.$prd->product_slug_en)}}">@if (session()->get('language')=='ro') {{ $prd->product_name_ro }} @else {{ $prd->product_name_en }} @endif </a></h3>
          
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> @if ($prd->discount_price==NULL) {{ $prd->selling_price }}EUR @else {{ $prd->discount_price }}EUR @endif</span>
                           <span class="price-before-discount">@if($prd->discount_price!=NULL) {{ $prd->selling_price }}EUR @endif </span> </div>
                          <!-- /.product-price --> 

                        </div>
                        <!-- /.product-info -->

                        
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  @endif
             @endforeach
          </div>
          <!-- /.home-owl-carousel --> 
        </section>

        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">@if (session()->get('language')=='ro') Papuci @else Shoes @endif </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
          @foreach($prd2 as $prd)
          @if($prd->subcategory_id == 6)
                  <div class="item item-carousel">
                    
                    <div class="products">
                      
                      <div class="product">
                        
                        <div class="product-image">

                          <div class="image"> <a href="{{url('product/details/'.$prd->id.'/'.$prd->product_slug_en)}}"><img  src="{{ $prd->product_thumbnail}}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{url('product/details/'.$prd->id.'/'.$prd->product_slug_en)}}">@if (session()->get('language')=='ro') {{ $prd->product_name_ro }} @else {{ $prd->product_name_en }} @endif </a></h3>
          
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> @if ($prd->discount_price==NULL) {{ $prd->selling_price }}EUR @else {{ $prd->discount_price }}EUR @endif</span>
                           <span class="price-before-discount">@if($prd->discount_price!=NULL) {{ $prd->selling_price }}EUR @endif </span> </div>
                          <!-- /.product-price --> 

                        </div>
                        <!-- /.product-info -->

                        
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  @endif
             @endforeach
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">@if (session()->get('language')=='ro') Ceasuri @else Watches @endif </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
          @foreach($prd3 as $prd)
          @if($prd->subcategory_id == 7)
                  <div class="item item-carousel">
                    
                    <div class="products">
                      
                      <div class="product">
                        
                        <div class="product-image">

                          <div class="image"> <a href="{{url('product/details/'.$prd->id.'/'.$prd->product_slug_en)}}"><img  src="{{ $prd->product_thumbnail}}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{url('product/details/'.$prd->id.'/'.$prd->product_slug_en)}}">@if (session()->get('language')=='ro') {{ $prd->product_name_ro }} @else {{ $prd->product_name_en }} @endif </a></h3>
          
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> @if ($prd->discount_price==NULL) {{ $prd->selling_price }}EUR @else {{ $prd->discount_price }}EUR @endif</span>
                           <span class="price-before-discount">@if($prd->discount_price!=NULL) {{ $prd->selling_price }}EUR @endif </span> </div>
                          <!-- /.product-price --> 

                        </div>
                        <!-- /.product-info -->

                        
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  @endif
             @endforeach
          </div>
          <!-- /.home-owl-carousel --> 
        </section>


       
      
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 

        <!-- ============================================== BEST SELLER ============================================== -->
         
        <!-- ============================================== BEST SELLER : END ============================================== --> 
        
        <!-- ============================================== BLOG SLIDER ============================================== -->

        <!-- ============================================== BLOG SLIDER : END ============================================== --> 
        
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>

@endsection
