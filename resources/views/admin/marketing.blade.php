@extends('layouts.app')


@section('content')



    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
			  <div class="content-header-left col-md-6 col-12 mb-1">
				<h3 class="content-header-title">Marketing</h3>
			  </div>
			  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
				<div class="breadcrumb-wrapper col-12">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">Marketing
					</li>
				  </ol>
				</div>
			  </div>
        </div>
        <div class="content-body"><!-- Sales stats -->
		
				<section id="dom">
					<div class="row">
					<div class="col-12 text-right mb-2"><a href="{{url('admin/add-marketing')}}" class="btn btn-danger rounded-0">Add New</a></div>
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
										<table class="table table-striped table-bordered dom-jQuery-events">
											<thead>
											   <tr>
											   <th>Referral Source</th>
												<th>Name</th>
												<th>Address</th>
												<th>Phone No.</th>
												<th>Business Name</th>
												<th>Last Contact Date</th>
												<th>Actions</th>   
											   </tr>
											</thead>
											<tbody>
												@if(count($market_list) > 0)
													@foreach($market_list as $eachitem)
													<tr>
													   
														<td> {{$eachitem['referral_source']}}</td>
														<td> {{$eachitem['name']}}</td>
														 <td>{{$eachitem['address']}}</td>
														 <td>{{$eachitem['phone']}}</td>
														 <td>{{$eachitem['business_name']}}</td>
														 <td>{{$eachitem['last_contact_date']}}</td>
														<td><a href="{{url('admin/edit-marketing')}}/{{$eachitem['id']}}">Edit</a> | <a onclick="deleteFunc('Marketing',{{$eachitem['id']}})" href="#">Delete</a></td>
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