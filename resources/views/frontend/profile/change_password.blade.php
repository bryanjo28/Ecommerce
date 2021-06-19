@extends('frontend.main_master')
@section('content')
    
@php
	$user = DB::table('users')->where('id', Auth::user()->id)->first();	
@endphp

<div class="body-content">
	<div class="container">
			<div class="row">
				@include('frontend.common.user_sidebar')

				<div class="col-md-2">
					
				</div>

				<div class="col-md-6">
					<div class="card">
						<h3 class="text-center">
							Change Password</h3>

							<div class="card-body">
								<form method="post" action="{{route('user.password.update')}}">
									@csrf
									<div class="form-group">
										<h5>Current Password <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="password" id="current_password" name="oldpassword" class="form-control" required="">
										</div>
									</div>
									<div class="form-group">
										<h5>New Password <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="password" id="password" name="password" class="form-control" required="">
										</div>
									</div>
									<div class="form-group">
										<h5>Confirm Password <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="">
										</div>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-danger">Update</button>
									</div>
								</form>
							</div>
					</div>
				</div>
			</div>
	</div>


	@include('frontend.body.brands')

</div>







@endsection