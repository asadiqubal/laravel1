@extends('layouts.app')


@section('content')

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
			  <div class="content-header-left col-md-6 col-12 mb-1">
				<h3 class="content-header-title">Add Schedule</h3>
			  </div>
			  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
				<div class="breadcrumb-wrapper col-12">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">Add Schedule
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
											<form id="addStaffForm" class="form-horizontal form-simple" method="POST" action="{{ url('admin/submitaddSchedule') }}" novalidate  enctype="multipart/form-data">
											@csrf
											@if(isset($id) && !empty($id))
												<input type="hidden" name="id" value="{{$id}}">
											@endif
											<div class="form-body">
												<div class="row">
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="projectinput3">Employee</label>
															<select name="staff_id" id="staff_id" class="form-control">
															<option value="">Select Staff</option>
															@if(count($StaffList) > 0)
																@foreach($StaffList as $eachstaff)
																	<option @if(isset($timesheetDetail->staff_id) && $timesheetDetail->staff_id == $eachstaff->id) selected @endif value="{{$eachstaff->id}}">{{$eachstaff->name}} - {{$eachstaff->employee_code}}</option>
																@endforeach
															@endif
															</select>
															
															
														</div>
													</div>
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="projectinput3">Client</label>
															<select name="client_id"  id="client_id" class="form-control">
															<option value="">Select Client</option>
															@if(count($ClientList) > 0)
																@foreach($ClientList as $eachstaff)
																	<option @if(isset($timesheetDetail->client_id) && $timesheetDetail->client_id == $eachstaff->id) selected @endif value="{{$eachstaff->id}}">{{$eachstaff->name}}</option>
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
															<label for="time_in">Start Time</label>
															<input type="time" id="time_in" class="form-control" name="time_in" value="@if(isset($timesheetDetail->time_in) && !empty($timesheetDetail->time_in)){{$timesheetDetail->time_in}}@else{{old('time_in')}}@endif">
														</div>
														
													</div>
													<div class="col-md-6 col-sm-12 col-12">
													
													
														<div class="form-group">
															<label for="time_out">End Time</label>
															<input type="time" id="time_out" class="form-control" name="time_out" value="@if(isset($timesheetDetail->time_out) && !empty($timesheetDetail->time_out)){{$timesheetDetail->time_out}}@else{{old('time_out')}}@endif">
														</div>
													</div>
													<div class="col-md-6 col-sm-12 col-12">
													
													
														<div class="form-group">
															<label for="admin_notes">Notes</label>
															<textarea id="admin_notes" class="form-control" name="admin_notes">@if(isset($timesheetDetail->admin_notes) && !empty($timesheetDetail->admin_notes)){{$timesheetDetail->admin_notes}}@else{{old('admin_notes')}}@endif</textarea>
															
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
									
									<div class="col-sm-12">
									<table class="table table-striped table-bordered dom-jQuery-events">
											<thead>
											   <tr>
												<th>Employee Name</th>
												<th>Client Name</th>
												<th>Schedule Date</th>

												<th>Schedule Time</th>
												<th>Actions</th>   
											   </tr>
											</thead>
											<tbody id="append_toby">
												@if(count($schedule_list) > 0)
													@foreach($schedule_list as $eachval)
													<?php
													    	$staffDetail = App\Helpers\CommonHelper::getStaffDetails($eachval->staff_id);
							
													$clientDetail = App\Helpers\CommonHelper::getClientDetails($eachval->client_id);
													?>
													<tr>
													   
													 <td>{{$staffDetail['name']}}</td>
														 <td>{{$clientDetail['name']}}</td>
														 
														 <td>{{ date('d M Y',strtotime($eachval['date_in']))}}</td>
														  
														  
															<td>{{$eachval['time_in']}} - {{$eachval['time_out']}}</td>
														
														<td><a href="{{url('admin/edit-schedule')}}/{{$eachval['id']}}">Edit</a> | <a onclick="deleteFunc('Schedule',{{$eachval['id']}})" href="#">Delete</a></td>
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


@section('footer-js')

    <script>
            var frm = $('#addStaffForm');
  /*          var now = new Date('2022-01-28');
const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

            var now = new Date('2022-01-28');
const monthNames = ["Jan", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];



var dateString = monthNames[now.getMonth()];

var dateString = moment(now).format('DD dateString YYYY');
console.log(dateString) // Output: 2020-07-21
*/
    frm.submit(function (e) {

        e.preventDefault();
        
        var staff_id  = $("#staff_id option:selected").text();
        var client_id  = $("#client_id option:selected").text();
        var date_in  = $('#date_in').val();
        var time_in  = $('#time_in').val();
        var time_out  = $('#time_out').val();
        
        var date_in = new Date("'"+date_in+"'");
       var date_in = moment(date_in).format('DD MM YYYY'); // 30-Dec-2011

        
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                 $('.appended_error').remove();
                if(data ==1){
                    $('#addStaffForm').prepend('<div class="appended_error alert alert-success  fade in alert-dismissible show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:20px">×</span></button>Schedule has been added successfully</div>');
                    
                    
                    $('#append_toby').prepend('<tr><td>'+staff_id+'</td><td>'+client_id+'</td><td>'+date_in+'</td><td>'+time_in+'-'+time_out+'</td></tr>');
                    
                    
                }else if(data == 2){
                    $('#addStaffForm').prepend('<div class="appended_error alert alert-success  fade in alert-dismissible show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:20px">×</span></button>Schedule has been updated successfully</div>');
                }else if(data ==3){
                    
                     $('#addStaffForm').prepend('<div class="appended_error alert alert-danger  fade in alert-dismissible show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:20px">×</span></button>Already Added in this date</div>');
                }else{
                   
                    $('#addStaffForm').prepend('<div class="appended_error alert alert-danger fade in alert-dismissible show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:20px">×</span></button>'+data+'</div>');
                }
                
                console.log('Submission was successful.');
                console.log(data);
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });

    </script>
@endsection


