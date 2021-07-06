@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="#">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="../images/logo-dark.png" alt="">
						  <h3 class="text-white"><b>KulinerKita</b></h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		    <li class="{{($route == 'dashboard')? 'active':''}}">
          <a href="{{url('admin/dashboard')}}">
            <i data-feather="pie-chart"></i>
		    	<span class="text-black fw-bold">Dashboard</span>
          </a>
        </li>  
        @php
          $brand = (auth()->guard('admin')->user()->brand == 1);
          $category = (auth()->guard('admin')->user()->category == 1);
          $product = (auth()->guard('admin')->user()->product == 1);
          $slider = (auth()->guard('admin')->user()->slider == 1);
          $coupons = (auth()->guard('admin')->user()->coupons == 1);
          $shipping = (auth()->guard('admin')->user()->shipping == 1);
          $refund = (auth()->guard('admin')->user()->refund == 1);
          $review = (auth()->guard('admin')->user()->review == 1);
          $orders = (auth()->guard('admin')->user()->orders == 1);
          $stock = (auth()->guard('admin')->user()->stock == 1);
          $alluser = (auth()->guard('admin')->user()->alluser == 1);
          $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
        @endphp

        @if($brand == true)
        <li class="treeview {{($prefix == '/brand')? 'active':''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span class="text-black fw-bold">Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.brand')? 'active':''}}"><a href="{{route('all.brand')}}"><i class="ti-more"></i>All brand</a></li>
  
          </ul>
        </li> 
        @else
        @endif

        @if($category== true)
        <li class="treeview {{($prefix == '/category')? 'active':''}}" >
          <a href="#">
            <i data-feather="mail"></i> <span class="text-black fw-bold">Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.category')? 'active':''}}"><a href="{{route('all.category')}}"><i class="ti-more"></i>All Category</a></li>
            <li class="{{($route == 'all.subcategory')? 'active':''}}"><a href="{{route('all.subcategory')}}"><i class="ti-more"></i>All SubCategory</a></li>
          </ul>
        </li>
        @else
        @endif

        @if($product== true)
        <li class="treeview {{($prefix == '/product')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span class="text-black fw-bold">Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'add-product')? 'active':''}}"><a href="{{route('add-product')}}"><i class="ti-more"></i>Add Products</a></li>
            <li class="{{($route == 'manage-product')? 'active':''}}"><a href="{{route('manage-product')}}"><i class="ti-more"></i>Manage Products</a></li>
            
          </ul>
        </li> 		  
        @else
        @endif

        @if($slider== true)
        <li class="treeview {{($prefix == '/slider')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span class="text-black fw-bold">Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'manage-slider')? 'active':''}}"><a href="{{route('manage-slider')}}"><i class="ti-more"></i>Manage Slider</a></li>
            
          </ul>
        </li> 
        @else
        @endif

        @if($coupons== true)
        <li class="treeview {{ ($prefix == '/coupons')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Coupons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage-coupon')? 'active':'' }}"><a href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>

          </ul>
        </li>
        @else
        @endif

        @if($shipping== true)
        <li class="treeview {{($prefix == '/shipping')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span class="text-black fw-bold">Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'manage-division')? 'active':'' }}"><a href="{{ route('manage-division') }}"><i class="ti-more"></i>Ship Division</a></li>
            <li class="{{ ($route == 'manage-district')? 'active':'' }}"><a href="{{ route('manage-district') }}"><i class="ti-more"></i>Ship Disctricts</a></li>
          </ul>
        </li> 
        @else
        @endif

        @if($orders== true)
        <li class="treeview {{($prefix == '/orders')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span class="text-black fw-bold">Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a href="{{ route('pending-orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
            <li class="{{ ($route == 'confirm-orders')? 'active':'' }}"><a href="{{ route('confirm-orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>
            <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Orders</a></li>
            <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i> Picked Orders</a></li>
            <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Shipped Orders</a></li>
           <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Delivered Orders</a></li>
      
            <li class="{{ ($route == 'cancel-orders')? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Cancel Orders</a></li>
          </ul>
        </li> 
        @else
        @endif

        @if($refund== true)
        <li class="treeview {{ ($prefix == '/refund')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Refund Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'refund.request')? 'active':'' }}"><a href="{{ route('refund.request') }}"><i class="ti-more"></i>Refund Request</a></li>
            <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}"><i class="ti-more"></i>All Refund Request</a></li>
          </ul>
        </li> 
        @else
        @endif

        @if($review== true)
        <li class="treeview {{ ($prefix == '/review')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Manage Review</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'pending.review')? 'active':'' }}"><a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a></li>
            <li class="{{ ($route == 'publish.review')? 'active':'' }}"><a href="{{ route('publish.review') }}"><i class="ti-more"></i>Publish Review</a></li>
          </ul>
        </li>  
        @else
        @endif
        
        @if($stock== true)
        <li class="treeview {{ ($prefix == '/stock')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Manage Stock </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="{{ ($route == 'product.stock')? 'active':'' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a></li>


          </ul>
        </li>    
        @else
        @endif

        <li class="header nav-small-cap">User Interface</li>

        @if($alluser== true)
        <li class="treeview {{ ($prefix == '/alluser')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>All Users </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="{{ ($route == 'all-users')? 'active':'' }}"><a href="{{ route('all-users') }}"><i class="ti-more"></i>All Users</a></li>
           

          </ul>
        </li> 
        @else
        @endif
        
        @if($adminuserrole== true)
        <li class="treeview {{ ($prefix == '/adminuserrole')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Seller Role </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="{{ ($route == 'all.admin.user')? 'active':'' }}"><a href="{{ route('all.admin.user') }}"><i class="ti-more"></i>All Seller </a></li>


          </ul>
        </li>    
        @else
        @endif

          </ul>
        </li>  
        
        
		  
      </ul>
    </section>
	
    <div class="sidebar-footer">
      
      <!-- item-->
      <a href="https://mailtrap.io/inboxes" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
      <!-- item-->
      <a href="{{route('admin.logout')}}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
  </aside>