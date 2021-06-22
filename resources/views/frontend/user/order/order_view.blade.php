@extends('frontend.main_master')
@section('content')
    
<div class="body-content" style="padding-top: 20px;">
	<div class="container">
			<div class="row">
				@include('frontend.common.user_sidebar')
				<div class="col-md-1"></div>
				<div class="col-md-9">

					<div class="table-responsive">
					  <table class="table">
								<tbody>
					
									<tr style="background: #e2e2e2;">
										<td class="col-md-1">
											<label for=""> Date</label>
										</td>
					
										<td class="col-md-3">
											<label for=""> Total</label>
										</td>
						
										<td class="col-md-2">
											<label for=""> Payment</label>
										</td>
						
						
										<td class="col-md-2">
											<label for=""> Invoice</label>
										</td>
						
										<td class="col-md-1">
											<label for=""> Order</label>
										</td>
						
										<td class="col-md-3">
											<label for=""> Action </label>
										</td>
					
									</tr>
					
					
									@foreach($orders as $order)
								<tr>
									<td class="col-md-1">
										<label for=""> {{ $order->order_date }}</label>
									</td>
					
									<td class="col-md-3">
										<label for=""> Rp {{number_format($order->amount, 2 )}}</label>
									</td>
					
					
									<td class="col-md-1">
										<label for=""> {{ $order->payment_method }}</label>
									</td>
					
									<td class="col-md-2">
										<label for=""> {{ $order->invoice_no }}</label>
									</td>
					
									<td class="col-md-1">
										<label for=""> 
											@if($order->status == 'pending')        
												<span class="badge badge-pill badge-warning" style="background: #800080;"> Pending </span>
											@elseif($order->status == 'confirm')
											 	<span class="badge badge-pill badge-warning" style="background: #0000FF;"> Confirm </span>
											
											@elseif($order->status == 'processing')
											<span class="badge badge-pill badge-warning" style="background: green;"> Processing </span>
						 
											 @elseif($order->status == 'picked')
											<span class="badge badge-pill badge-warning" style="background: #808000;"> Picked </span>
						 
											 @elseif($order->status == 'shipped')
											<span class="badge badge-pill badge-warning" style="background: #808080;"> Shipped </span>
						 
											 @elseif($order->status == 'delivered')
											<span class="badge badge-pill badge-warning" style="background: orange;"> Delivered </span>

											@if($order->return_order == 1) 
												<span class="badge badge-pill badge-warning" style="background:red;">Refund Requested </span>
												
													@elseif($order->return_order== 2)
												<span class="badge badge-pill badge-warning" style="background: green;"> Refund Success </span>
											@endif
											@else	
											 <span class="badge badge-pill badge-warning" style="background: #FF0000;"> Cancel </span>
										 @endif	
										</label>
									</td>
					
									<td class="col-md-3">
										<div class="d-flex justify-content-between">
											<a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-primary" data-toggle="tooltips" title="View Detail"><i class="fa fa-eye"></i></a>
					
											<a target="_blank" href="{{ url('user/invoice_download/'.$order->id ) }}" class="btn btn-danger" data-toggle="tooltips" title="Download Invoice"><i class="fa fa-download" style="color: white;"></i></a>
										</div>
									</td>
				
				
							</div>
								
					
								</td>
			
						  </tr>
						 		 @endforeach
			
			
			
			
			
							</tbody>
			
					  </table>
			
					</div>
			
			
			
			
			
				   </div> <!-- / end col md 8 -->

				
			</div>
	</div>


	@include('frontend.body.brands')

</div>







@endsection