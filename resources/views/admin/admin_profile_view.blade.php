@extends('admin.admin_master')
@section('admin')
	<div class="container-full">

    <!-- Main content -->
    <section class="content">
			<div class="row">
				<div class="col-xl-6">
					<div class="box box-widget widget-user">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header bg-black" >
							<h3 class="widget-user-username" style="color: black">Seller Name: {{$adminData->name}}</h3>
							
							<a href="{{route('admin.profile.edit')}}" style="float:right;" class="btn btn-rounded btn-warning">Edit Profile</a>

							<h6 class="widget-user-desc" style="color: black">Seller Email: {{$adminData->email}}</h6>
							<h6 class="widget-user-desc" style="color: black">Seller Phone: {{$adminData-> phone}}</h6>
						</div>
						<div class="widget-user-image">
							<img class="rounded-circle" src="{{(!empty($adminData->profile_photo_path))? 
							url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg')}}" alt="User Avatar">
						</div>
						<div class="box-footer">
							<div class="row">
							
							</div>
							<!-- /.row -->
						</div>
						</div>
				</div>






				
			</div>
    </section>
    <!-- /.content -->
  </div>
@endsection