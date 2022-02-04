@extends('layouts.app')


@section('content')

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
			  <div class="content-header-left col-md-6 col-12 mb-1">
				<h3 class="content-header-title">Timesheet</h3>
			  </div>
			  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
				<div class="breadcrumb-wrapper col-12">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">Timesheet
					</li>
				  </ol>
				</div>
			  </div>
        </div>
        <div class="content-body"><!-- Sales stats -->
		
				<section id="dom">
					
				<div class="row">
					<div class="col-12">
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
								<div class="row justify-content-end">
									<div class="col-md-2 col-sm-12 col-12 pt-1 text-right"><b>Select Date</b></div>	
									<?php
										if(isset($_GET['date']) && !empty($_GET['date'])){
											$currentData = $_GET['date'];
										}else{
												$currentData = date('Y-m-d');
										}
										
									?>
									<div class="col-md-3 col-sm-12 col-12 mb-2 text-right"><input type="date" class="date_in_selectform form-control" value="{{$currentData}}"></div>

								</div>
								
								
									<table class="table table-striped table-bordered dom-jQuery-events">
										<thead>
											<tr>
											   <th>Date</th>
											   <th>Employee Name</th>
												<th>Time In</th>
												<th>Time Out</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@if(count($timesheet_list) > 0)
												@foreach($timesheet_list as $each)
													<tr>
														<td>{{$each->date_in}} </td>
														<td>{{$each->name}} </td>
														<td>{{$each->time_in}}</td>
														<td>{{$each->time_out}}</td>
														<td><a href="{{url('admin/edit-timesheet')}}/{{$each->id}}">Edit</a> | <a onclick="deleteFunc('Timesheet',{{$each->id}})" href="#">Delete</a></td>
													</tr>
												@endforeach
											@endif
											
											
											
										</tbody>
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


@section('footer-js')
<script>
	$('.date_in_selectform').on('change', function(){
	   window.location = "timesheet/?date="+$(this).val();
	});

</script>
@endsection