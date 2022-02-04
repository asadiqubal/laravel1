

@extends('layouts.staff')

@section('content')


    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
			  <div class="content-header-left col-md-6 col-12 mb-1">
				<h3 class="content-header-title">Past Visits</h3>
			  </div>
			  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
				<div class="breadcrumb-wrapper col-12">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a>
					</li>
					
					<li class="breadcrumb-item active">Past Visits
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
							   
								<div class="card-content collapse show">
									<div class="card-body card-dashboard">
										<table class="table table-striped table-bordered dom-jQuery-events">
											<thead>
											   <tr>
												<th>Date</th>
												<th>Time</th>
												<th>Client Name</th>
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
															
															<td>{{$each->time_in}} - {{$each->time_out}}</td>
															<?php
																
																$clientDetail = App\Helpers\CommonHelper::getClientDetails($each->client_id);
																
																$staffDetail = App\Helpers\CommonHelper::getStaffDetails($each->staff_id);
															?>
															<td>
																@if($clientDetail['photo'])
														<img width="40" height="40" src="{{asset('client')}}/{{$clientDetail['photo']}}" class="rounded-circle mr-1" alt=""> 
														@endif
															{{$clientDetail['name']}} </td>
															<td>{{$clientDetail['address']}} </td>
															<td>
																<?php
																	if($each->status == 0){
																		echo "To Do";
																	}else{
																		echo "Done";
																	}
																?>
															</td>
															<td>
																<a data-toggle="modal" data-target="#myModal_<?php echo $each->id; ?>">View Detail</a> 
																<div id="myModal_<?php echo $each->id; ?>" class="modal fade" role="dialog">
																	  <div class="modal-dialog">
																	
																	
																		<div class="modal-content" style="top: 120px;">
																				<div class="modal-header" style="float: right;display: block;">
																	<button style="float: right;top: -3px;border: none;color: red;" type="button" class="close" data-dismiss="modal">&times;</button>      </div>

																		  <div class="modal-body">
																			<div class="text-right">
																				<?php if($each->status == 0){ 
																						$changeto = "1";
																						?>
																						<p><a href="{{url('staff/change-status')}}/{{$each->id}}/{{$changeto}}" onclick="return confirm('Are you sure?')" class="btn btn-info">Mark as Done</a></p>
																						<?php }else{ 
																						$changeto = "0";
																						?>
																						
																						<p><a href="{{url('staff/change-status')}}/{{$each->id}}/{{$changeto}}" onclick="return confirm('Are you sure?')" class="btn btn-info">Mark as To Do</a></p>
																						<?php
																						}
																						?>
																			</div>


																			<p><b>{{ date('d M Y',strtotime($each->date_in))}} ({{$each->time_in}} - {{$each->time_out}})</b></p>
																			
																				<p><b>Status:</b> <?php if($each->status == 0){ ?>To Do <?php }else{ ?> <span style=";font-weight:bold">Done</span> <?php } ?></p>
																			<p><b>Client:</b> {{$clientDetail['name']}}</p>
																			<p><b>Client Address:</b> {{$clientDetail['address']}}</p>
																			<!--<p>Staff: {{$staffDetail['name']}} ( {{$staffDetail['employee_code']}} )</p>-->
																		
																			
																			<p><b>Admin Notes:</b> @if($each->admin_notes){{$each->admin_notes}} @else {{"NA"}} @endif </p>
																			<p><b>Staff Notes:</b> @if($each->staff_notes){{$each->staff_notes}} @else {{"NA"}} @endif </p>
																			<p><b>Client Notes:</b> @if($each->client_notes){{$each->client_notes}} @else {{"NA"}} @endif </p>
																				<?php
																					if(empty($each->staff_notes)){
																				?>

																					<!--<button  class="btn btn-primary Mybtn_show">Add Note</button>
							-->
																					<form id="MyForm" action="{{url('staff/submitNotesForm')}}" method="post">
																					@csrf
																						<input type="hidden" name="id" value="{{$each->id}}">
																						<div class="form-group">
																							<label for="staff_notes">Notes</label>
																							<textarea required id="staff_notes" placeholder="Add your notes" class="form-control" name="staff_notes">@if(isset($each->staff_notes) && !empty($each->staff_notes)){{$each->staff_notes}}@else{{old('staff_notes')}}@endif</textarea>
																							
																						</div>
																					<br>
																					<input type="submit" class="btn btn-info" name="submit" value="Submit"/>
																					</form>
																				<?php
																					}
																				?>
																		  </div>
																		</div>
																	
																	  </div>
																	</div>
															
															</td>
															
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

   <style>
	
#MyForm{

width: 100%;
    border: 1px solid #ccc;
    padding: 14px;
    margin-top: 13px;
}
   </style>

@endsection