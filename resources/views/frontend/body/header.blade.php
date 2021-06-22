<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
  
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
              <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
              @auth
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
                My Account
                <ul class="dropdown-menu">
                  
                  <li><a href="{{route('login')}}"><span class="text-black">User Profile</span></a></li> 
                  <li><a href="{{ route('my.orders') }}"><span class="text-black">My Order</span></a></li>
                  <li><a href="" type="button" data-toggle="modal" data-target="#ordertracking"><span class="text-black">Order Tracking</span></a></li>
                  <li><a href="{{ route('user.logout') }}"><span class="text-black">Logout</span></a></li>
                </ul>
              </li>   
              @else
              <li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Login/Register</a></li>     
              @endauth
            </ul>
          </div>
          <!-- /.cnt-account -->
          
          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
                @if(session()->get('language') == 'indo') Bahasa @else Language @endif
                </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  @if(session()->get('language') == 'indo')
                    <li><a href="{{route('english.language')}}">English</a></li>
                    @else
                    <li><a href="{{route('indo.language')}}">Indonesia</a></li>
                  @endif
                </ul>
              </li>
            </ul>
            <!-- /.list-unstyled --> 
          </div>
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner --> 
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.header-top --> 
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"> <a href="{{url('/')}}"> <img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo"> </a> </div>
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder"> 
            <!-- /.contact-row --> 
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form method="post" action="{{route('product.search')}}">
                @csrf
                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" >
                        <li class="menu-header">Computer</li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                      </ul>
                    </li>
                  </ul>
                  <input class="search-field" name="search" placeholder="Search here..." />
                  <button type="submit" class="search-button" href="#" ></button> 
                </div>
              </form>
            </div>
            <!-- /.search-area --> 
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row"> 
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            
            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
                <div class="total-price-basket"> <span class="lbl">cart -</span> 
                  <span class="total-price"> <span class="sign">Rp</span>
                  <span class="value" id="cartSubTotal"></span> </span> 
                </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>
                   <!-- mini cart ajax--> 
                  <div id="miniCart">

                  </div>

                   <!-- End mini cart ajax--> 
                  <!-- /.cart-item -->
                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text">Sub Total :</span>
                      <span class='price'  id="cartSubTotal"> </span> </div>
                    <div class="clearfix"></div>
                    <a href="{{route('checkout')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                  <!-- /.cart-total--> 
                  
                </li>
              </ul>
              <!-- /.dropdown-menu--> 
            </div>
            <!-- /.dropdown-cart --> 
            
            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
          <!-- /.top-cart-row --> 
        </div>
        <!-- /.row --> 
        
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.main-header --> 
    
    <!-- ============================================== NAVBAR ============================================== -->
   
    <!-- /.header-nav --> 
    <!-- ============================================== NAVBAR : END ============================================== --> 
    <!-- Order Traking Modal -->
    <div class="modal fade" id="ordertracking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form method="post" action="{{ route('order.tracking') }}">
              @csrf
            <div class="modal-body">
              <label>Invoice Code</label>
              <input type="text" name="code" required="" class="form-control" placeholder="Your Order Invoice Number">           
            </div>

            <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Track Now </button>

            </form> 


          </div>

        </div>
      </div>
    </div>

  </header>