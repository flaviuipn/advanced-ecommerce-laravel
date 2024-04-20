<header class="header-style-1"> 
    <!-- TOP MENU -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                       
                        <li>
                            @auth
                            <a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>{{ Auth::user()->name }}</a>
                            @else
                            <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>@if (session()->get('language')=='ro') Loghează-te| Înregistrează-te @else Login | Register @endif</a>
                            @endauth
                        </li>
                    </ul>
                </div>
                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <span class="value">@if (session()->get('language')=='ro') Limba @else Language @endif </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                @if(session()->get('language')=='ro')
                                <li><a href="{{ route('eng.language')}}">Engleză</a></li>
                                @else
                                <li><a href="{{ route('ro.language')}}">Romanian</a></li>
                                @endif
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
                                <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
                                <div class="total-price-basket"> 
                                    <span class="lbl">cart -</span> 
                                    <span class="total-price"> 
                                        
                                        <span class="value" id="cartSubTotal"> </span> 
                                        <span class="sign"> EUR</span>
                                    </span> 
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                
                            <!-- Mini Cart Start with AJAX -->
                                <div id="miniCart">



                                </div>



                            <!-- end minicart -->
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> 
                                        <span class="text">Sub Total :</span>
                                        <span class='price' id="cartSubTotal" style="color:black;"></span> 
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="{{route('mycart')}}" class="btn btn-upper btn-primary btn-block m-t-20" style="background-color: black; color:white;">Checkout</a> 
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
                                <li class="active dropdown yamm-fw"> <a href="{{url('/')}}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">@if (session()->get('language')=='ro') Acasă @else Home @endif</a> </li>

                    @php
                    //iau datele din tabelul category
                    $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                    @endphp
                                @foreach($categories as $category)
                                <li class="dropdown yamm mega-menu"> 
                                    <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">@if (session()->get('language')=='ro') {{ $category->category_name_ro }} @else {{ $category->category_name_en }} @endif </a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">
                                                @php
                                                //iau datele din tabelul subcategory
                                                $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_eng', 'ASC')->get();
                                                @endphp
                                                @foreach($subcategories as $subcategory)
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <h2 class="title">@if (session()->get('language')=='ro') {{ $subcategory->subcategory_name_ro }} @else {{ $subcategory->subcategory_name_eng }} @endif </h2>
                                                        @php
                                                        //iau datele din tabelul subcategory
                                                        $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)->orderBy('subsubcategory_name_eng', 'ASC')->get();
                                                        @endphp
                                                        @foreach($subsubcategories as $subsubcategory)
                                                        <ul class="links">
                                                            <li><a href="#">@if (session()->get('language')=='ro') {{ $subsubcategory->subsubcategory_name_ro }} @else {{ $subsubcategory->subsubcategory_name_eng }} @endif </a></li>
                                                        </ul>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> 
                                                        <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt=""> 
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
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
