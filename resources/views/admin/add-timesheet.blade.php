@extends('layouts.app')


@section('content')




    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
			  <div class="content-header-left col-md-6 col-12 mb-1">
				<h3 class="content-header-title">Add Timesheet</h3>
			  </div>
			  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
				<div class="breadcrumb-wrapper col-12">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">Add Timesheet
					</li>
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
											<form id="addStaffForm" class="form-horizontal form-simple" method="POST" action="{{ url('admin/submitaddTimesheet') }}" novalidate  enctype="multipart/form-data">
											@csrf
											@if(isset($id) && !empty($id))
												<input type="hidden" name="id" value="{{$id}}">
											@endif
											<div class="form-body">
												<div class="row">
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="projectinput3">Employee</label>
															<select name="user_id" class="form-control">
															<option value="">Select Staff</option>
															@if(count($StaffList) > 0)
																@foreach($StaffList as $eachstaff)
																	<option @if(isset($timesheetDetail->user_id) && $timesheetDetail->user_id == $eachstaff->id) selected @endif value="{{$eachstaff->id}}">{{$eachstaff->name}} - {{$eachstaff->employee_code}}</option>
																@endforeach
															@endif
															</select>
															
															
														</div>
													</div>
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="date_in">Date</label>
															<input type="date" id="date_in" class="form-control" name="date_in" value="@if(isset($timesheetDetail->date_in) && !empty($timesheetDetail->date_in)){{$timesheetDetail->date_in}}@else{{old('date_in')}}@endif">
														</div>
													</div>
													
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="projectinput5">Time In</label>
															<input type="time" id="projectinput5" class="form-control" name="time_in" value="@if(isset($timesheetDetail->time_in) && !empty($timesheetDetail->time_in)){{$timesheetDetail->time_in}}@else{{old('time_in')}}@endif">
														</div>
														
													</div>
													<div class="col-md-6 col-sm-12 col-12">
													
													
														<div class="form-group">
															<label for="time_out">Time Out</label>
															<input type="time" id="time_out" class="form-control" name="time_out" value="@if(isset($timesheetDetail->time_out) && !empty($timesheetDetail->time_out)){{$timesheetDetail->time_out}}@else{{old('time_out')}}@endif">
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