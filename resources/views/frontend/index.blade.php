@extends('frontend.main_master')
@section('content')
@section('title')
KulinerKita Market
@endsection

<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
        <!-- ================================== TOP NAVIGATION ================================== -->
        @include('frontend.common.vertical_menu')
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
        
        <!-- ============================================== HOT DEALS ============================================== -->
        @include('frontend.common.hot_deals')
        <!-- ============================================== HOT DEALS: END ============================================== --> 
        
        
        <!-- ============================================== PRODUCT TAGS ============================================== -->
        @include('frontend.common.product_tags')
        <!-- /.sidebar-widget --> 
        <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
       
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            @foreach($sliders as $slider)
            <div class="item" style="background-image: url({{ asset($slider->slider_img) }});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
        
                  <div class="big-text fadeInDown-1">{{ $slider->title }} </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
            @endforeach
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
                      <h4 class="info-box-heading green">Pre Order</h4>
                    </div>
                  </div>
                  <h6 class="text">Pengiriman tepat Waktu!</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Harga</h4>
                    </div>
                  </div>
                  <h6 class="text">Harga Makanan Sangat Terjangkau</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Diskon Besar</h4>
                    </div>
                  </div>
                  <h6 class="text">Dapatkan Diskon Besar dengan menggunakan kupon! </h6>
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
            <h3 class="new-product-title pull-left">New Products</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>

              @foreach($categories as $category)
                <li><a data-transition-type="backSlide" href="#category{{$category->id}}" data-toggle="tab">{{$category ->category_name_en}}</a></li>
              @endforeach
              <!--<li> <a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> -->

            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">

            <div class="tab-pane in active" id="all" >
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                  @foreach($products as $product)
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                            <!-- /.image -->
                            @php
                              $amount = $product->selling_price - $product->discount_price;
                              $discount = ($amount/$product->selling_price) * 100;
                            @endphp   
                            <div>
                              @if ($product->discount_price == NULL)
                                <div class="tag new"><span>new</span></div>
                              @else
                                <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                              @endif
                            </div>
                          </div>
                          <!-- /.product-image -->
                          
                          <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                              @if(session()->get('language') == 'indo') {{$product->product_name_id}} 
                              @else {{$product->product_name_en}} @endif
                            </a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>
                            @if ($product->discount_price == NULL)
                              <div class="product-price"> <span class="price"> Rp{{number_format($product ->selling_price, 2 )}}</span>  </div>
                            @else
                              <div class="product-price"> <span class="price"> Rp{{number_format($product ->discount_price, 2 )}} </span> <span class="price-before-discount">Rp {{number_format($product ->selling_price, 2 )}}</span> </div>
                            @endif
                            <!-- /.product-price --> 
                            
                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button  class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                   <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </li>
                              </ul>
                            </div>
                            <!-- /.action --> 
                          </div>
                          <!-- /.cart --> 
                        </div>
                        <!-- /.product --> 
                        
                      </div>
                      <!-- /.products --> 
                    </div>
                    <!-- /.item -->
                  @endforeach <!-- /.hend product foreach --> 
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
            

            @foreach( $categories as $category)
              <div class="tab-pane" id="category{{$category->id}}">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    @php
                      $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get(); 
                    @endphp
                    @forelse($catwiseProduct as $product)
                      <div class="item item-carousel">
                        <div class="products">
                          <div class="product">
                            <div class="product-image">
                              <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                <img  src="{{asset($product->product_thumbnail)}}" alt=""></a> 
                              </div>
                              <!-- /.image -->
                              @php
                                $amount = $product->selling_price - $product->discount_price;
                                $discount = ($amount/$product->selling_price) * 100;
                              @endphp  
                              <div>
                                @if ($product->discount_price == NULL)
                                <div class="tag new"><span>new</span></div>
                                @else
                                <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                @endif
                              </div>
                            </div>
                            <!-- /.product-image -->
                            
                            <div class="product-info text-left">
                              <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                @if(session()->get('language') == 'indo') {{$product->product_name_id}} 
                                @else {{$product->product_name_en}} @endif
                              </a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              @if ($product->discount_price == NULL)
                               <div class="product-price"> <span class="price"> Rp{{number_format($product ->selling_price, 2 )}}</span>  </div>
                              @else
                                <div class="product-price"> <span class="price"> Rp{{number_format($product ->discount_price, 2 )}} </span> <span class="price-before-discount">Rp {{number_format($product ->selling_price, 2 )}}</span> </div>
                              @endif
                              <!-- /.product-price --> 
                              
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button  class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li>
                                </ul>
                              </div>
                              <!-- /.action --> 
                            </div>
                            <!-- /.cart --> 
                          </div>
                          <!-- /.product --> 
                          
                        </div>
                        <!-- /.products --> 
                      </div>
                      <!-- /.item -->
                      @empty
                      <h5 class="text-danger">No Product Found</h5>
                    @endforelse <!-- /.end product forelse --> 
                  </div>
                  <!-- /.home-owl-carousel --> 
                </div>
                <!-- /.product-slider --> 
              </div>
            @endforeach
            
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
             
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Featured products</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            
      
            @foreach($featured as $product)
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                  <!-- /.image -->
                  @php
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = ($amount/$product->selling_price) * 100;
                  @endphp   
                  <div>
                    @if ($product->discount_price == NULL)
                      <div class="tag new"><span>new</span></div>
                    @else
                      <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                    @endif
                  </div>
                </div>
                <!-- /.product-image -->
                
                <div class="product-info text-left">
                  <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                    @if(session()->get('language') == 'indo') {{$product->product_name_id}} 
                    @else {{$product->product_name_en}} @endif
                  </a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>
                  @if ($product->discount_price == NULL)
                    <div class="product-price"> <span class="price"> Rp{{number_format($product ->selling_price, 2 )}}</span>  </div>
                  @else
                    <div class="product-price"> <span class="price"> Rp{{number_format($product ->discount_price, 2 )}} </span> <span class="price-before-discount">Rp {{number_format($product ->selling_price, 2 )}}</span> </div>
                  @endif
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <ul class="list-unstyled">
                      <li class="add-cart-button btn-group">
                        <button  class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                      </li>
                    </ul>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
              <!-- /.product --> 
              
            </div> <!-- /.products --> 

            @endforeach 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 

        <!-- ============================================== Skip _product_0 PRODUCTS ============================================== -->
        
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title"> @if(session()->get('language') == 'indo') {{ $skip_category_0->category_name_id }} @else {{ $skip_category_0->category_name_en }} @endif</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            
      
            @foreach($skip_product_0 as $product)
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                  <!-- /.image -->
                  @php
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = ($amount/$product->selling_price) * 100;
                  @endphp   
                  <div>
                    @if ($product->discount_price == NULL)
                      <div class="tag new"><span>new</span></div>
                    @else
                      <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                    @endif
                  </div>
                </div>
                <!-- /.product-image -->
                
                <div class="product-info text-left">
                  <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                    @if(session()->get('language') == 'indo') {{$product->product_name_id}} 
                    @else {{$product->product_name_en}} @endif
                  </a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>
                  @if ($product->discount_price == NULL)
                    <div class="product-price"> <span class="price"> Rp{{number_format($product ->selling_price, 2 )}}</span>  </div>
                  @else
                    <div class="product-price"> <span class="price"> Rp{{number_format($product ->discount_price, 2 )}} </span> <span class="price-before-discount">Rp {{number_format($product ->selling_price, 2 )}}</span> </div>
                  @endif
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <ul class="list-unstyled">
                      <li class="add-cart-button btn-group">
                        <button  class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                      </li>
                    </ul>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
              <!-- /.product --> 
              
            </div> <!-- /.products --> 

            @endforeach 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== Skip _product_0 PRODUCTS : END ============================================== -->

         <!-- ============================================== Skip _product_1 PRODUCTS ============================================== -->
        
         <section class="section featured-product wow fadeInUp">
          <h3 class="section-title"> @if(session()->get('language') == 'indo') {{ $skip_category_1->category_name_id }} @else {{ $skip_category_1->category_name_en }} @endif</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            
      
            @foreach($skip_product_1 as $product)
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                  <!-- /.image -->
                  @php
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = ($amount/$product->selling_price) * 100;
                  @endphp   
                  <div>
                    @if ($product->discount_price == NULL)
                      <div class="tag new"><span>new</span></div>
                    @else
                      <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                    @endif
                  </div>
                </div>
                <!-- /.product-image -->
                
                <div class="product-info text-left">
                  <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                    @if(session()->get('language') == 'indo') {{$product->product_name_id}} 
                    @else {{$product->product_name_en}} @endif
                  </a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>
                  @if ($product->discount_price == NULL)
                    <div class="product-price"> <span class="price"> Rp{{number_format($product ->selling_price, 2 )}}</span>  </div>
                  @else
                    <div class="product-price"> <span class="price"> Rp{{number_format($product ->discount_price, 2 )}} </span> <span class="price-before-discount">Rp {{number_format($product ->selling_price, 2 )}}</span> </div>
                  @endif
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <ul class="list-unstyled">
                      <li class="add-cart-button btn-group">
                        <button  class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                      </li>
                    </ul>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
              <!-- /.product --> 
              
            </div> <!-- /.products --> 

            @endforeach 
          </div>
          <!-- /.home-owl-carousel --> 
        </section> <!-- /.section --> 
        <!-- ============================================== Skip _product_1 PRODUCTS : END ============================================== -->



        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right"><br>
                      <span class="shopping-needs"></span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
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


        
       
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
   
    @include('frontend.body.brands')
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>

@endsection