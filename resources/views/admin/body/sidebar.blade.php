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
			
            <!-- Application -->
            <li class="treeview">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Application</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="chat.html"><i class="ti-more"></i>Chat</a></li>
                    <li><a href="calendar.html"><i class="ti-more"></i>Calendar</a></li>
                </ul>
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
            
            <!-- User Interface -->
            <li class="header nav-small-cap">User Interface</li>
			
            <!-- Components -->
            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <!-- Other components -->
                </ul>
            </li>
			
            <!-- Cards -->
            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <!-- Other card types -->
                </ul>
            </li>  

        </ul>
    </section>
	
    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
        <!-- Settings -->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- Email -->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- Logout -->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
