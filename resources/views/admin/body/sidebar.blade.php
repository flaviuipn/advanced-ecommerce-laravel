@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- Sidebar -->
    <section class="sidebar">	
		
        <!-- User Profile -->
        <div class="user-profile">
            <div class="ulogo">
                <a href="">
                    <!-- Logo -->
                    <div class="d-flex align-items-center justify-content-center">					 	
                        <img src="{{ asset('backend/images/nikejordan.png')}}" alt="" style="margin-right: 15px">
                        <h3><b>YX</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>
      
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">  
            <!-- Dashboard -->
            <li>
                <a href="{{route('dashb')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>  
			
			
            <!-- Site Categories -->
            <li class="treeview {{ ($prefix == '/category') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa-solid fa-list"></i><span>Site Categories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.category') ? 'active' : '' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>Categories</a></li>
                    <li class="{{ ($route == 'all.subcategory') ? 'active' : '' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>Subcategories</a></li>
                    <li class="{{ ($route == 'all.subsubcategory') ? 'active' : '' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>Sub-subcategories</a></li>
                </ul>
            </li>
			
            <!-- Products -->
            <li class="treeview {{ ($prefix == '/product') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa-solid fa-cart-arrow-down"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'add-product') ? 'active' : '' }}"><a href="{{ route('add-product')}}"><i class="ti-more"></i>Add </a></li>
                    <li class="{{ ($route == 'manage-product') ? 'active' : '' }}"><a href="{{ route('manage-product')}}"><i class="ti-more"></i>Manage</a></li>
                </ul>
            </li> 	
            
           
        </ul>
    </section>

</aside>
