<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{csrf_token()}}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')


<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 
<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script>
		@if(Session::has('message'))
		var type = "{{ Session::get('alert-type','info') }}"
		switch(type){
				case 'info':
				toastr.info(" {{ Session::get('message') }} ");
				break;

				case 'success':
				toastr.success(" {{ Session::get('message') }} ");
				break;

				case 'warning':
				toastr.warning(" {{ Session::get('message') }} ");
				break;

				case 'error':
				toastr.error(" {{ Session::get('message') }} ");
				break; 
		}
		@endif 
	</script>

	<!-- Add to Cart Product Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   	<div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span> </strong></h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="card" style="width: 18rem;">
							<img src=" " class="card-img-top" alt="..." style="height: 200px; width: 200px;" id="pimage">
						</div>
					</div><!-- // end col md -->
					<div class="col-md-4">
						<ul class="list-group">
							<li class="list-group-item">Product Price: <strong class="text-danger">Rp
								<span id="pprice"></span></strong> <del id="oldprice">Rp</del></li>
							<li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
							<li class="list-group-item">Category: <strong id="pcategory"></strong></li>
							<li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
							<li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="available"
								style="color:white; background:green;"></span>
								<span class="badge badge-pill badge-danger" id="stockout"
								style="color:white; background:red;"></span>
							</li>
						</ul>
					</div><!-- // end col md -->
					<div class="col-md-4">
						<div class="form-group">
							<label for="qty">Quantity</label>
    					<input type="number" class="form-control" id="qty" value="1" min="1" >
						</div> <!-- // end form group -->
						<input type="hidden" id="product_id">
						<button type="submit" class="btn btn-primary mb-2" onclick="addToCart()" >Add to Cart</button>
					</div>
       	</div>
    	 </div>
   		</div>
 		</div>
	</div>	 
	<!-- End add to Cart Product Modal -->

	<script type="text/javascript">
		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			}
		})
		
		// Start Product View with Modal 
		function productView(id){
			$.ajax({
        type: 'GET',
        url: '/product/view/modal/'+id,
        dataType:'json',
        success:function(data){
					$('#pname').text(data.product.product_name_en);
					$('#price').text(data.product.selling_price);
					$('#pcode').text(data.product.product_code);
					$('#pcategory').text(data.product.category.category_name_en);
					$('#pbrand').text(data.product.brand.brand_name_en);
					$('#pimage').attr('src','/'+data.product.product_thumbnail);
					$('#product_id').val(id);
          $('#qty').val(1);

					// Product Price 
					if (data.product.discount_price == null) {
                $('#pprice').text('');
                $('#oldprice').text('');
                $('#pprice').text(data.product.selling_price);
            }else{
                $('#pprice').text(data.product.discount_price);
                $('#oldprice').text(data.product.selling_price);
            } // end product price 

					// Product Price
					if(data.product.product_qty >0){
						$('#available').text('');
						$('#stockout').text('');
						$('#available').text('available');
					} else {
						$('#available').text('');
						$('#stockout').text('');
						$('#stockout').text('unvailable');
					}
        }
    })
		
		}
		//End Product View with Modal 

		// Add to Cart
		
    function addToCart(){
        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var quantity = $('#qty').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                 quantity:quantity, product_name:product_name
            },
            url: "/cart/data/store/"+id,
            success:function(data){
								miniCart()
								$('#closeModel').click();
                console.log(data)
								 // Start Message 
								 const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        })
    }

		// End Add to Cart
	</script>


	<!-- Mini Cart  -->
	<script type="text/javascript">
		function miniCart() {
			$.ajax({
				type: 'GET',
				url:'/product/mini/cart',
				dataType:'json',
				success:function(response){
					$('span[id="cartSubTotal"]').text(response.cartTotal);
					$('#cartQty').text(response.cartQty);
					var miniCart = ""

					$.each(response.carts,function(key,value){
						miniCart += `<div class="cart-item product-summary">
							<div class="row">
								<div class="col-xs-4">
									<div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
								</div>
								<div class="col-xs-7">
									<h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
									<div class="price"> ${value.price} * ${value.qty} </div>
								</div>
								<div class="col-xs-1 action">  <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button>  </div>
							</div>
						</div>
						<!-- /.cart-item -->
						<div class="clearfix"></div>
						<hr>`

					});

					$('#miniCart').html(miniCart);
				}
			})
		}
		miniCart();

		/// mini cart remove Start 
		function miniCartRemove(rowId){
				$.ajax({
						type: 'GET',
						url: '/minicart/product-remove/'+rowId,
						dataType:'json',
						success:function(data){
						miniCart();
						cart();
							// Start Message 
								const Toast = Swal.mixin({
											toast: true,
											position: 'top-end',
											icon: 'success',
											showConfirmButton: false,
											timer: 3000
										})
								if ($.isEmptyObject(data.error)) {
										Toast.fire({
												type: 'success',
												title: data.success
										})
								}else{
										Toast.fire({
												type: 'error',
												title: data.error
										})
								}
								// End Message 
						}
				});
			}
		//  end mini cart remove 
	</script>
	<!-- End Mini Cart -->


	<!-- My Cart Page -->
	<script type="text/javascript">
		function cart(){
				$.ajax({
							type: 'GET',
							url: '/user/get-cart-product',
							dataType:'json',
							success:function(response){
						var rows = ""
				$.each(response.carts, function(key,value){
					rows += `<tr>
						<td class="col-md-2"><img src="/${value.options.image} " alt="img" style="width:150px; height:100px;"></td>
						<td class="col-md-2">
								<div class="product-name"><a href="#">${value.name}</a></div>
								<div class="price">  ${value.price}</div>
						</td>
						<td class="col-md-2">
							${value.qty > 1
								? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button> `
								: `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button> `
           		 } 
      			  <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;" >  
         			<button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button>    
						</td>
						<td class="col-md-2">
							<strong>Rp ${value.subtotal} </strong> 
						</td>
						<td class="col-md-1">
						<button type="button" class="btn btn-danger" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fas fa-trash-alt"></i></button>
						</td>
					</tr>`
					});
									
					$('#cartPage').html(rows);
							}
					})
			}
		cart();

		///  Cart remove Start 
		function cartRemove(id){
				$.ajax({
					type: 'GET',
					url: '/user/cart-remove/'+id,
					dataType:'json',
					success:function(data){
					couponCalculation()
					cart();
					miniCart();
					$('#couponField').show();
            $('#coupon_name').val('');
					// Start Message 
						const Toast = Swal.mixin({
									toast: true,
									position: 'top-end',
									
									showConfirmButton: false,
									timer: 3000
								})
						if ($.isEmptyObject(data.error)) {
								Toast.fire({
										type: 'success',
										icon: 'success',
										title: data.success
								})
						}else{
								Toast.fire({
										type: 'error',
										icon: 'error',
										title: data.error
								})
						}
						// End Message 
					}
			});
		}
		// End Cart remove   

			// -------- CART Increment  --------//
		function cartIncrement(rowId){
			$.ajax({
				type:'GET',
				url: "/cart-increment/"+rowId,
				dataType:'json',
				success:function(data){
					couponCalculation()
					cart();
					miniCart();
				}
			});
    	}
			// -------- END CART Increment  --------//

			// -------- CART Decrement  --------//
		function cartDecrement(rowId){
			$.ajax({
				type:'GET',
				url: "/cart-decrement/"+rowId,
				dataType:'json',
				success:function(data){
					couponCalculation()
					cart();
					miniCart();
				}
			});
   		 }
 			// ---------- END CART Decrement -----///
	</script>
	<!-- End My Cart Page -->

	<!-- Coupon Apply-->
	<script type="text/javascript">
		function applyCoupon(){
			var coupon_name = $('#coupon_name').val();
			$.ajax({
					type: 'POST',
					dataType: 'json',
					data: {coupon_name:coupon_name},
					url: "{{ url('/coupon-apply') }}",
					success:function(data){
						couponCalculation();
						if (data.validity == true) {
							$('#couponField').hide();
						}
						// Start Message 
						const Toast = Swal.mixin({
												toast: true,
												position: 'top-end',
												
												showConfirmButton: false,
												timer: 3000
											})
									if ($.isEmptyObject(data.error)) {
											Toast.fire({
													type: 'success',
													icon: 'success',
													title: data.success
											})
									}else{
											Toast.fire({
													type: 'error',
													icon: 'error',
													title: data.error
											})
									}
							// End Message 

					}
			})
  	}  

		function couponCalculation(){
			$.ajax({
					type: 'GET',
					url: "{{ url('/coupon-calculation') }}",
					dataType: 'json',
					success:function(data){
						if(data.total){
							$('#couponCal').html(`<tr>
									<td>
										<div class="cart-sub-total">
											<span class="font-size-16 fw-bold">Sub Total</span><span class="inner-left-md font-size-16">Rp ${data.total}</span>
										</div>
										<hr>
										<div class="cart-grand-total">
											<span class="font-size-16 fw-bold">Grand Total</span><span class="inner-left-md font-size-16">Rp ${data.total}</span>
										</div>
									</td>
								</tr>`)
						}else{
							$('#couponCal').html(`<hr><tr>
									<td>
										<div class="cart-sub-total pb-1">
											<span class="font-size-16 fw-bold">Sub Total</span><span class="inner-left-md font-size-16">Rp ${data.subtotal}</span>
										</div>
										<div class="cart-sub-total pb-1">
											<span class="font-size-16 fw-bold">Coupon</span><span class="inner-left-md font-size-16">${data.coupon_name}</span>
											<button type="submit" class="btn btn-sm btn-danger" onclick="couponRemove()"><i class="fas fa-times"></i></button>
										</div>
										<div class="cart-sub-total pb-1">
											<span class="font-size-16 fw-bold">Discount</span><span class="inner-left-md font-size-16">Rp ${data.discount_amount}</span>
										</div>
										<hr>
										<div class="cart-grand-total">
											<span class="font-size-16 fw-bold">Grand Total</span><span class="inner-left-md font-size-16">Rp ${data.total_amount}</span>
										</div>
									</td>
								</tr>`)
						}
					}
			});
  	}
		couponCalculation();
	</script>
	<!-- End Coupon Apply -->

	<!-- Start Coupon Remove-->
	<script type="text/javascript">
		function couponRemove(){
			$.ajax({
				type: 'GET',
				url: "{{ url('/coupon-remove') }}",
				success:function(data){
					couponCalculation();
					$('#couponField').show();	
					$('#coupon_name').val('');
						// Start Message 
						const Toast = Swal.mixin({
												toast: true,
												position: 'top-end',
												
												showConfirmButton: false,
												timer: 3000
											})
									if ($.isEmptyObject(data.error)) {
											Toast.fire({
													type: 'success',
													icon: 'success',
													title: data.success
											})
									}else{
											Toast.fire({
													type: 'error',
													icon: 'error',
													title: data.error
											})
									}
							// End Message 
				}
			});
		}
	</script>
	<!-- End Coupon Remove-->
</body>
</html>