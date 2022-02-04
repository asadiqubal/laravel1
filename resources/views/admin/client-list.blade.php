@extends('layouts.app')


@section('content')



    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
			  <div class="content-header-left col-md-6 col-12 mb-1">
				<h3 class="content-header-title">Client List</h3>
			  </div>
			  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
				<div class="breadcrumb-wrapper col-12">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">Client List
					</li>
				  </ol>
				</div>
			  </div>
        </div>
        <div class="content-body"><!-- Sales stats -->
		
				<section id="dom">
					<div class="row">
					<div class="col-12 text-right mb-2"><a href="{{url('admin/add-client')}}" class="btn btn-danger rounded-0">Add New</a></div>
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
											<div class="col-sm-3 text-right">
												<select name="status" class="form-control"  onchange="this.options[this.selectedIndex].value && (window.location = 'client-list?status='+ this.options[this.selectedIndex].value);">
													<option value="0">Please select</option>
													<option <?php if(isset($_GET['status']) && $_GET['status'] == "1"){ echo "selected"; } ?> value="1">Active Client</option>
													<option <?php if(isset($_GET['status']) && $_GET['status'] == "2"){ echo "selected"; } ?> value="2">Past Client</option>
												</select>
											</div><br>
										<table class="table table-striped table-bordered dom-jQuery-events">
											<thead>
											   <tr>
												<th>Name</th>
												<th>Address</th>
												<th>Hourly Rate($)</th>
												<th>Client Since</th>
												
												<th>Status</th>   
												<th>Actions</th>   
											   </tr>
											</thead>
											<tbody>
											
												@if(count($client_list) > 0)
													@foreach($client_list as $eachitem)
													<tr>
													   
														<td>
														@if($eachitem['photo'])
														<img width="40" height="40" src="{{asset('client')}}/{{$eachitem['photo']}}" class="rounded-circle mr-1" alt=""> 
														@endif
														{{$eachitem['name']}}</td>
														 <td>{{$eachitem['address']}}</td>
														 <td>{{$eachitem['hourly_rate']}}</td>
														 <td>{{ date('Y-m-d',strtotime($eachitem['created_at']))}}</td>
														 <td>
																<?php
																	if($eachitem['status'] == "1"){
																		echo "Active";
																	}else{
																		echo "Past"."<br>";
																		echo $eachitem['leaving_reason'];
																	}
																?>
															</td>
														<td><a href="{{url('admin/edit-client')}}/{{$eachitem['id']}}">Edit/View</a> | <a onclick="deleteFunc('Client',{{$eachitem['id']}})" href="#">Delete</a></td>
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