@extends('layouts.client')

@section('content')


    

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
			  <div class="content-header-left col-md-6 col-12 mb-1">
				<h3 class="content-header-title">Dashboard</h3>
			  </div>
			  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
				<div class="breadcrumb-wrapper col-12">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">Dashboard
					</li>
				  </ol>
				</div>
			  </div>
        </div>
        <div class="content-body"><!-- Sales stats -->
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

		    <div class="row">
					<div class="col-xl-4 col-lg-6 col-12">
						<div class="card bg-gradient-directional-danger">
							<div class="card-content">
								<div class="card-body">
									<a href="{{url('client/today-schedule')}}" ><div class="media d-flex">
										<div class="media-body text-white text-left">
											<h3 class="text-white font-large-1">{{$schedule_today_count}}</h3>
											<span>Scheduled Visits Today</span>
										</div>
										<div class="align-self-center">
											<i class="icon-calendar text-white font-large-2 float-right"></i>
										</div>
									</div> </a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-12">
						<div class="card bg-gradient-directional-success">
							<div class="card-content">
								<div class="card-body">
									<a href="{{url('client/past-visit')}}" ><div class="media d-flex">
										<div class="media-body text-white text-left">
											<h3 class="text-white font-large-1">{{$schedule_past_count}}</h3>
											<span>Past Visits</span>
										</div>
										<div class="align-self-center">
											<i class="icon-speedometer text-white font-large-2 float-right"></i>
										</div>
									</div>  </a>
								</div>
							</div>
						</div>
					</div>

					
					
				</div>
	
	


        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   

   @endsection