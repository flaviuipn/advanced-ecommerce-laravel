<header class="header-style-1"> 
    <!-- TOP MENU -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-heart"></i> Wishlist</a></li>
                        <li>
                            @auth
                            <a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>{{ Auth::user()->name }}</a>
                            @else
                            <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i> Login | Register</a>
                            @endauth
                        </li>
                    </ul>
                </div>
                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <span class="value">USD </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">EUR</a></li>
                                <li><a href="#">RON</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <span class="value">English </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">Română</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- TOP MENU : END -->
    
    <!-- MAIN HEADER -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
                    <!-- LOGO -->
                    <div class="logo">
                        <a href="{{url('/')}}"> 
                            <img src="{{ asset('frontend/assets/images/nikejordan.png') }}" alt="logo"> 
                        </a> 
                    </div>
                    <!-- LOGO : END --> 
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
                    <!-- SEARCH AREA -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <input class="search-field" placeholder="Search..." />
                                <a class="search-button" href="#" ></a> 
                            </div>
                        </form>
                    </div>
                    <!-- SEARCH AREA : END --> 
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
                    <!-- SHOPPING CART DROPDOWN -->
                    <div class="dropdown dropdown-cart">
                        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count">2</span></div>
                                <div class="total-price-basket"> 
                                    <span class="lbl">cart -</span> 
                                    <span class="total-price"> 
                                        <span class="sign">$</span>
                                        <span class="value">600.00</span> 
                                    </span> 
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"> <a href="detail.html"><img src="assets/images/cart.jpg" alt=""></a> </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index.php?page-detail">Simple Product</a></h3>
                                            <div class="price">$600.00</div>
                                        </div>
                                        <div class="col-xs-1 action"> <a href="#"><i class="fa fa-trash"></i></a> </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> 
                                        <span class="text">Sub Total :</span>
                                        <span class='price'>$600.00</span> 
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> 
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- SHOPPING CART DROPDOWN : END --> 
                </div>
            </div>
        </div>
    </div>
    <!-- MAIN HEADER : END --> 
    
    <!-- NAVBAR -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
                        <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                    </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="/" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>
                                <li class="dropdown yamm mega-menu"> 
                                    <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Men</a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <h2 class="title">Clothing</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Tops and T-shirts</a></li>
                                                            <li><a href="#">Hoodies and Sweatshirts </a></li>
                                                            <li><a href="#">Shorts</a></li>
                                                            <li><a href="#">Trousers and Tights</a></li>
                                                            <li><a href="#">Tracksuits</a></li>
                                                            <li><a href="#">Jackets</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu" style="margin-left: 15px;">
                                                        <h2 class="title">Shoes</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Lifestyle</a></li>
                                                            <li><a href="#">Jordan </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <h2 class="title">Watches</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Apple Watch</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> 
                                                        <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt=""> 
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- NAVBAR : END --> 
</header>
