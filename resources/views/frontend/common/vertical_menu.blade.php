@php
$categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
@endphp 

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        @foreach($categories as $category)
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{$category->category_icon}}" aria-hidden="true"></i>
          @if(session()->get('language') == 'indo') {{$category->category_name_id}} @else {{$category->category_name_en}} @endif </a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
                @php
                  $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                @endphp   
                @foreach($subcategories as $subcategory)         
                <div class="col-sm-12">
                  <ul class="links list-unstyled">
                    <li>
                      <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en ) }}">
                        @if(session()->get('language') == 'indo') 
                        {{ $subcategory->subcategory_name_id }}
                        @else 
                        {{ $subcategory->subcategory_name_en }} 
                        @endif
                      </a>
                    </li>
                  </ul>
                </div>
                @endforeach<!-- /.end sub-->
                <!-- /.col -->
              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> 
        </li>
        
        @endforeach
        <!-- /.menu-item -->
        
    
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>