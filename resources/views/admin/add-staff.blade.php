@extends('layouts.app')


@section('content')




    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
			  <div class="content-header-left col-md-6 col-12 mb-1">
				<h3 class="content-header-title">
					@if(isset($id) && !empty($id))
					Edit Staff
				
				
					@else
						
						    Add Staff
				
				
					@endif
				</h3>
			  </div>
			  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
				<div class="breadcrumb-wrapper col-12">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a>
					</li>
						@if(isset($id) && !empty($id))
					<li class="breadcrumb-item active">Edit Staff
					</li>
					@else
						<li class="breadcrumb-item active">Add Staff
					</li>
					@endif
				  </ol>
				</div>
			  </div>
        </div>
        <div class="content-body"><!-- Sales stats -->
		
				<section id="dom">
					<div class="row">
					
						<div class="col-md-12 col-sm-12 col-12">
							<div class="card">
							   
								<div class="card-content collapse show">
									<div class="card-body card-dashboard">
									{{-- error --}}
										 @if(session('success'))
											<div class="alert alert-success fade in alert-dismissible show">                
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true" style="font-size:20px">×</span>
												</button>
												{{ session('success') }}
											</div>
											@endif
											@if(session('error'))
											<div class="alert alert-danger fade in alert-dismissible show">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												  <span aria-hidden="true" style="font-size:20px">×</span>
												</button>    
												{{ session('error') }}
											</div>
											@endif
											<form id="addStaffForm" class="form-horizontal form-simple" method="POST" action="{{ url('admin/submitaddStaff') }}" novalidate  enctype="multipart/form-data">
											@csrf
											@if(isset($id) && !empty($id))
												<input type="hidden" name="id" value="{{$id}}">
												<input type="hidden" name="user_id" value="{{$staffDetail->user_id}}">
											@endif
											<div class="form-body">
												<div class="row">
												    
												    
												    	<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="username">Username</label>
															@if(isset($id) && !empty($id))
																
															<input type="text" id="username" class="form-control" name="username" value="@if(isset($userData->username) && !empty($userData->username)){{$userData->username}}@else{{old('username')}}@endif" readonly>
															
															@else
															<input type="text" id="username" class="form-control" name="username" value="@if(isset($userData->username) && !empty($userData->username)){{$userData->username}}@else{{$username}}@endif">
															@endif
														</div>
													</div>
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="password">Password</label>
															<input type="text" id="password" class="form-control" name="password" value="@if(isset($userData->password_txt) && !empty($userData->password_txt)){{$userData->password_txt}}@else{{$password}}@endif">
														</div>
													</div>
												    
												    
												    
												    
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="projectinput3">Employee Code</label>
															<input type="text" id="projectinput3" class="form-control" name="employee_code" value="@if(isset($staffDetail->employee_code) && !empty($staffDetail->employee_code)) {{$staffDetail->employee_code}} @else {{old('employee_code')}} @endif">
														</div>
													</div>
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="projectinput3">Name</label>
															<input type="text" id="projectinput3" class="form-control" name="name" value="@if(isset($staffDetail->name) && !empty($staffDetail->name)){{$staffDetail->name}}@else{{old('name')}}@endif">
														</div>
													</div>
													
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="projectinput5">Phone</label>
															<input type="text" id="projectinput5" class="form-control" name="phone" value="@if(isset($staffDetail->phone) && !empty($staffDetail->phone)){{$staffDetail->phone}}@else{{old('phone')}}@endif">
														</div>
														
													</div>
													<div class="col-md-6 col-sm-12 col-12">
													
													
														<div class="form-group">
															<label for="email">Email</label>
															<input type="email" id="email" class="form-control" name="email" value="@if(isset($staffDetail->email) && !empty($staffDetail->email)){{$staffDetail->email}}@else{{old('email')}}@endif">
														</div>
													</div>
													<div class="col-md-6 col-sm-12 col-12">
													
													
														<div class="form-group">
															<label for="age">Age</label>
															<input type="text" id="age" class="form-control" name="age" value="@if(isset($staffDetail->age) && !empty($staffDetail->age)){{$staffDetail->age}}@else{{old('age')}}@endif">
														</div>
													</div>
													
													<div class="col-md-6 col-sm-12 col-12">
													
													
														<div class="form-group">
															<label for="hourly_rate">Hourly Rate($)</label>
															<input type="text" id="hourly_rate" class="form-control" name="hourly_rate" value="@if(isset($staffDetail->hourly_rate) && !empty($staffDetail->hourly_rate)){{$staffDetail->hourly_rate}}@else{{old('hourly_rate')}}@endif">
														</div>
													</div>
													
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="joining_date">Joining Date</label>
															<input type="date" id="joining_date" class="form-control" name="joining_date" value="@if(isset($staffDetail->joining_date) && !empty($staffDetail->joining_date)){{$staffDetail->joining_date}}@else{{old('joining_date')}}@endif">
														</div>
													</div>
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="registery_no">Registery No</label>
															<input type="text" id="registery_no" class="form-control" name="registery_no" value="@if(isset($staffDetail->registery_no) && !empty($staffDetail->registery_no)){{$staffDetail->registery_no}}@else{{old('registery_no')}}@endif">
														</div>
													</div>
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="licence_no">Licence No</label>
															<input type="text" id="licence_no" class="form-control" name="licence_no" value="@if(isset($staffDetail->licence_no) && !empty($staffDetail->licence_no)){{$staffDetail->licence_no}}@else {{old('licence_no')}}@endif">
														</div>
													</div>
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="expiry_date">Expiry Date</label>
															<input type="date" id="expiry_date" class="form-control" name="expiry_date" value="@if(isset($staffDetail->expiry_date) && !empty($staffDetail->expiry_date)){{$staffDetail->expiry_date}}@else{{old('expiry_date')}}@endif">
														</div>
													</div>
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="projectinput4">Address</label>
															<textarea id="projectinput4" name="address" class="form-control"> @if(isset($staffDetail->address) && !empty($staffDetail->address)){{$staffDetail->address}}@else{{old('address')}}@endif</textarea>
															
														</div>
														
													</div>
												
												
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="projectinput4">Staff Photo</label>
															<input type="file" class="form-control" name="image">
															@if(isset($staffDetail->photo) && $staffDetail->photo)
																<input type="hidden" value="{{$staffDetail->photo}}" name="old_image">
															@endif
														</div>
														
													</div>
													
													
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="projectinput4">Status</label>
															<select name="status" class="form-control status">
																<option <?php if(isset($staffDetail->status) && $staffDetail->status == "1"){ echo "selected"; }  ?> value="1">Active</option>
																<option <?php if(isset($staffDetail->status) && $staffDetail->status == "2"){ echo "selected"; }  ?> value="2">Past</option>
															
															</select>
														</div>
														
													</div>
													
													<div class="col-md-6 col-sm-12 col-12 leaving_date_div" <?php if(isset($staffDetail->status) && $staffDetail->status == "2"){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php }  ?> >
														<div class="form-group">
															<label for="projectinput4">Leaving date</label>
															<input type="date" id="leaving_date" class="form-control" name="leaving_date" value="@if(isset($staffDetail->leaving_date) && !empty($staffDetail->leaving_date)){{$staffDetail->leaving_date}}@else{{old('leaving_date')}}@endif">
														</div>
														
													</div>
													
													
													<div class="col-md-6 col-sm-12 col-12 leaving_reason_div" <?php if(isset($staffDetail->status) && $staffDetail->status == "2"){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php }  ?>>
														<div class="form-group">
															<label for="projectinput4">Leaving reason</label>
															<select name="leaving_reason" class="form-control">
																<option <?php if(isset($staffDetail->leaving_reason) && $staffDetail->leaving_reason == "Fired"){ echo "selected"; }  ?> value="Fired">Fired</option>
																<option <?php if(isset($staffDetail->leaving_reason) && $staffDetail->leaving_reason == "Switched to another job"){ echo "selected"; }  ?> value="Switched to another job">Switched to another job</option>
																<option <?php if(isset($staffDetail->leaving_reason) && $staffDetail->leaving_reason == "Health ground"){ echo "selected"; }  ?> value="Health ground">Health ground</option>
																<option <?php if(isset($staffDetail->leaving_reason) && $staffDetail->leaving_reason == "Moved to another city"){ echo "selected"; }  ?> value="Moved to another city">Moved to another city</option>
																<option <?php if(isset($staffDetail->leaving_reason) && $staffDetail->leaving_reason == "Retired"){ echo "selected"; }  ?> value="Retired">Retired</option>
																<option <?php if(isset($staffDetail->leaving_reason) && $staffDetail->leaving_reason == "Personal"){ echo "selected"; }  ?> value="Personal">Personal</option>
															
															</select>
														</div>
														
													</div>
													
													
												</div>
												
											   												
											</div>

											<div class="form-actions text-right">
												<button name="submit" type="submit" class="btn btn-info rounded-0">
													Submit
												</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
</section>
<!-- DOM - jQuery events table -->
	


        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   
@endsection


 
 @section('footer-js')
	<script>
		$(document).ready(function(){
			$('.status').on('change', function() {
				var selc =  $(this).find(":selected").val();
				
				if(selc == "1"){
					$('.leaving_date_div').hide();
					$('.leaving_reason_div').hide();
				}else{
					$('.leaving_date_div').show();
					$('.leaving_reason_div').show();
				}
			});

		});
	</script>
 @endsection