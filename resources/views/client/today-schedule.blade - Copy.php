

@extends('layouts.client')

@section('content')


    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
			  <div class="content-header-left col-md-6 col-12 mb-1">
				<h3 class="content-header-title">Today Schedule</h3>
			  </div>
			  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
				<div class="breadcrumb-wrapper col-12">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">Today Schedule
					</li>
				  </ol>
				</div>
			  </div>
        </div>
        <div class="content-body"><!-- Sales stats -->
		
				<section id="dom">
					<div class="row">
					<!--<div class="col-12 text-right mb-2"><a href="add-staff.html" class="btn btn-danger rounded-0">Add New</a></div>-->
						<div class="col-12">
							<div class="card">
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
								<div class="card-content collapse show">
									<div class="card-body card-dashboard">
										<table class="table table-striped table-bordered dom-jQuery-events">
											<thead>
											   <tr>
												<th>Date</th>
												<th>Time</th>
												<th>Staff Name</th>
												<th>Address</th>
												<th>Status</th>
												<th>Actions</th>   
											   </tr>
											</thead>
											<tbody>
												@if(count($record) > 0)
													@foreach($record as $each)
														<tr>
															<td>{{$each->date_in}} </td>
															
															<td>{{$each->time_in}}</td>
															<?php
																
																$staffDetail = App\Helpers\CommonHelper::getStaffDetails($each->staff_id);
															?>
															<td>{{$staffDetail['name']}} </td>
															<td>{{$staffDetail['address']}} </td>
															<td><?php
																	if($each->status == "0"){
																		$status = "Inprogress";
																		$changeto = "1";
																	}elseif($each->status == "1"){
																		$status = "Completed";
																		$changeto = "0";
																	}
																?>
																{{$status}}</td>
															<td><a href="{{url('staff/change-status')}}/{{$each->id}}/{{$changeto}}" onclick="return confirm('Are you sure?')" >Change Status</a> | <a href="#">View Detail</a> </td>
															
														</tr>
													@endforeach
												@endif
											</tfoot>
										</table>
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