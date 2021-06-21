<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use PDF;
use DB;

class OrderController extends Controller
{
    //
    	// Pending Orders 
	public function PendingOrders(){
		$orders = Order::where('status','pending')->orderBy('id','DESC')->get();
		return view('backend.orders.pending_orders',compact('orders'));

	} // end method 

    public function PendingOrdersDetails($order_id){

		$order = Order::with('division','district','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('backend.orders.pending_orders_details',compact('order','orderItem'));

	} // end method 

    // Confirmed Orders 
	public function ConfirmOrders(){
		$orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
		return view('backend.orders.confirmed_orders',compact('orders'));

	} // end method 

    // Processing Orders 
	public function ProcessingOrders(){
		$orders = Order::where('status','processing')->orderBy('id','DESC')->get();
		return view('backend.orders.processing_orders',compact('orders'));

	} // end method  


	// Picked Orders 
	public function PickedOrders(){
		$orders = Order::where('status','picked')->orderBy('id','DESC')->get();
		return view('backend.orders.picked_orders',compact('orders'));

	} // end method  


	// Shipped Orders 
	public function ShippedOrders(){
		$orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
		return view('backend.orders.shipped_orders',compact('orders'));

	} // end method  


	// Delivered Orders 
	public function DeliveredOrders(){
		$orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
		return view('backend.orders.delivered_orders',compact('orders'));

	} // end method  


	// Cancel Orders 
	public function CancelOrders(){
		$orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
		return view('backend.orders.cancel_orders',compact('orders'));

	} // end method 

    // PendingtoConfirm Orders 
    public function PendingToConfirm($order_id){

        Order::findOrFail($order_id)->update(['status' => 'confirm']);
  
        $notification = array(
              'message' => 'Order Confirm Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('pending-orders')->with($notification);
  
  
      } // end method

    // ConfirmProcessing Orders 
    public function ConfirmToProcessing($order_id){

        Order::findOrFail($order_id)->update(['status' => 'processing']);
  
        $notification = array(
              'message' => 'Order Processing Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('confirm-orders')->with($notification);
  
  
      } // end method
  
  
     // ProcessingPicked Orders 
     public function ProcessingToPicked($order_id){
  
        Order::findOrFail($order_id)->update(['status' => 'picked']);
  
        $notification = array(
              'message' => 'Order Picked Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('processing-orders')->with($notification);
  
  
      } // end method
  
    // PickedToShipped Orders 
       public function PickedToShipped($order_id){
  
        Order::findOrFail($order_id)->update(['status' => 'shipped']);
  
        $notification = array(
              'message' => 'Order Shipped Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('picked-orders')->with($notification);
  
  
      } // end method
  
      // ShippedToDelivered Orders 
       public function ShippedToDelivered($order_id){
           
        $product = OrderItem::where('order_id',$order_id)->get();
        foreach ($product as $item) {
            Product::where('id',$item->product_id)
                    ->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
        } 
   
        Order::findOrFail($order_id)->update(['status' => 'delivered']);
  
        $notification = array(
              'message' => 'Order Delivered Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('shipped-orders')->with($notification);
  
  
      } // end method

      // OrdertoCancel
      public function OrdertoCancel($order_id){
  
        Order::findOrFail($order_id)->update(['status' => 'cancel']);
  
        $notification = array(
              'message' => 'Order Canceled Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('cancel-orders')->with($notification);
  
  
      } // end method

      public function AdminInvoiceDownload($order_id){

		$order = Order::with('division','district','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

		$pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('invoice.pdf');

	} // end method 
  
}   
