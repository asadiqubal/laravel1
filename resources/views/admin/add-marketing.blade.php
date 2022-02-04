@extends('layouts.app')


@section('content')



    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
			  <div class="content-header-left col-md-6 col-12 mb-1">
				<h3 class="content-header-title">Add Marketing</h3>
			  </div>
			  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
				<div class="breadcrumb-wrapper col-12">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">Add Marketing
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
											<form id="addStaffForm" class="form-horizontal form-simple" method="POST" action="{{ url('admin/submitaddMarketing') }}" novalidate  enctype="multipart/form-data">
											@csrf
											@if(isset($id) && !empty($id))
												<input type="hidden" name="id" value="{{$id}}">
											@endif
											<div class="form-body">
												<div class="row">
													<div class="col-md-6 col-sm-12 col-12">
															<div class="form-group">
																<label for="referral_source">Referral Source</label>
																<input type="text" id="referral_source" class="form-control" name="referral_source" value="@if(isset($marketDetail->referral_source) && !empty($marketDetail->referral_source)){{$marketDetail->referral_source}}@else {{old('referral_source')}} @endif">
															</div>
													</div>
													
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="name">Name</label>
															<input type="text" id="name" class="form-control" name="name" value="@if(isset($marketDetail->name) && !empty($marketDetail->name)){{$marketDetail->name}}@else {{old('name')}} @endif">
														</div>
													</div>
													
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="phone">Phone</label>
															<input type="text" id="phone" class="form-control" name="phone" value="@if(isset($marketDetail->phone) && !empty($marketDetail->phone)){{$marketDetail->phone}}@else {{old('phone')}} @endif">
														</div>
														
													</div>
													
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="address">Address</label>
															<textarea id="address" class="form-control" name="address"> @if(isset($marketDetail->address) && !empty($marketDetail->address)) {{$marketDetail->address}}@else {{old('address')}} @endif</textarea>
															
														</div>
														
													</div>
													
													<div class="col-md-6 col-sm-12 col-12">
														<div class="form-group">
															<label for="business_name">Business Name</label>
															<input type="text" id="business_name" class="form-control" name="business_name" value="@if(isset($marketDetail->business_name) && !empty($marketDetail->business_name)){{$marketDetail->business_name}}@else {{old('business_name')}} @endif">
														</div>
													</div>
													<div class="col-md-6 col-sm-12 col-12">
													<div class="form-group">
															<label for="last_contact_date">Last Contact Date</label>
															<input type="date" id="last_contact_date" class="form-control" name="last_contact_date" value="@if(isset($marketDetail->last_contact_date) && !empty($marketDetail->last_contact_date)){{$marketDetail->last_contact_date}}@else {{old('last_contact_date')}} @endif">
														</div>
													</div>
												</div>
																								
											</div>

											<div class="form-actions text-right">
												<button type="submit" class="btn btn-info rounded-0">
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