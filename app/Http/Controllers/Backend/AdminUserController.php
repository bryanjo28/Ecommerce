<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;
use Image;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserController extends Controller
{
    //
    public function SellerView(){

    	$adminuser = Admin::where('type',2)->latest()->get();
    	return view('backend.role.admin_role_all',compact('adminuser'));

    } // end method 

    // Add Seller
    public function AddSeller(){
    	return view('backend.role.admin_role_create');
    }

    public function SellerStore(Request $request){

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupons' => $request->coupons,

            'shipping' => $request->shipping,
            'orders' => $request->orders,
            'refund' => $request->refund,
            'review' => $request->review,

            'stock' => $request->stock,
            'alluser' => $request->alluser,
            'adminuserrole' => $request->adminuserrole,
            'type' => 2,
            'created_at' => Carbon::now(),


            ]);

            $notification = array(
                'message' => 'Seller Created Successfully',
                'alert-type' => 'success'
            );

		return redirect()->route('all.admin.user')->with($notification);

    } // end method 

    // Seller Edit
    public function SellerEdit($id){

    	$adminuser = Admin::findOrFail($id);
    	return view('backend.role.admin_role_edit',compact('adminuser'));

    } // end method
    
    // Seller Update
    public function SellerUpdate(Request $request){

    	$admin_id = $request->id;

    	Admin::findOrFail($admin_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupons' => $request->coupons,
    
            'shipping' => $request->shipping,
            'orders' => $request->orders,
            'refund' => $request->refund,
            'review' => $request->review,
    
            'stock' => $request->stock,
            'alluser' => $request->alluser,
            'adminuserrole' => $request->adminuserrole,
            'type' => 2,

		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Admin User Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.admin.user')->with($notification);


    } // end method 

    // Seller Delete
    public function SellerDelete($id){

        Admin::findOrFail($id)->delete();

         $notification = array(
           'message' => 'Admin User Deleted Successfully',
           'alert-type' => 'info'
       );

       return redirect()->back()->with($notification);

    } // end method 



    // Seller View Register
    public function ViewSellerRegister(){
      return view('auth.seller_register');
    }
    
    // Seller Register Store
    public function AdminSellerStore(Request $request){
     

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => 1,
            'slider' => $request->slider,
            'coupons' => $request->coupons,

            'shipping' => $request->shipping,
            'orders' => 1,
            'refund' => 1,
            'review' => 1,

            'stock' => 1,
            'alluser' => $request->alluser,
            'adminuserrole' => $request->adminuserrole,
            'type' => 2,
            'created_at' => Carbon::now(),


            ]);

            $notification = array(
                'message' => 'Register Seller Created Successfully',
                'alert-type' => 'success'
            );

		return redirect()->route('admin.login')->with($notification);
    }



    // User View
    public function UsersView(){
      $users = User::latest()->get();
      return view('backend.user.all_user',compact('users'));
    }

    // User Edit
    public function UserEdit($id){

    	$users = User::findOrFail($id);
    	return view('backend.user.user_role_edit',compact('users'));

    } // end method

    //User Update
    public function UserUpdate(Request $request){
      $user_id = $request->id;
    
     User::findOrFail($user_id)->update([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,

      'created_at' => Carbon::now(),

        ]);

        $notification = array(
        'message' => 'User Updated Successfully',
        'alert-type' => 'info'
      );

		return redirect()->route('all-users')->with($notification);

    } // end method


       //User Delete
    public function UserDelete($id){

      User::findOrFail($id)->delete();

       $notification = array(
         'message' => 'User Deleted Successfully',
         'alert-type' => 'info'
     );

     return redirect()->back()->with($notification);

  } // end method 
}
