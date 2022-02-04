
@extends('layouts.staff')

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
						   <?php
							$current_month = date('m');
							$current_year = date('Y');
							if(isset($_GET['month']) && !empty($_GET['month'])){
								
							}else{
								$_GET['month'] = $current_month;
							}
							if(isset($_GET['year']) && !empty($_GET['year'])){
								$current_year = $_GET['year'];
							}else{
								$current_year = $current_year;
							}
							
						   ?>
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
								<div class="row justify-content-end">
									<div class="col-md-3 col-sm-12 col-12 text-right"><select name="month" class="month_in_selectform form-control"> 
									<option selected >month</option>
									<option <?php if(isset($_GET['month']) && $_GET['month'] == "1"){ echo "selected"; } ?> value="1">Jan</option>
									<option <?php if(isset($_GET['month']) && $_GET['month'] == "2"){ echo "selected"; } ?> value="2">Feb</option>
									<option <?php if(isset($_GET['month']) && $_GET['month'] == "3"){ echo "selected"; } ?> value="3">Mar</option>
									<option <?php if(isset($_GET['month']) && $_GET['month'] == "4"){ echo "selected"; } ?> value="4">Apr</option>
									<option <?php if(isset($_GET['month']) && $_GET['month'] == "5"){ echo "selected"; } ?> value="5">May</option>
									<option <?php if(isset($_GET['month']) && $_GET['month'] == "6"){ echo "selected"; } ?> value="6">Jun</option>
									<option <?php if(isset($_GET['month']) && $_GET['month'] == "7"){ echo "selected"; } ?> value="7">Jul</option>
									<option <?php if(isset($_GET['month']) && $_GET['month'] == "8"){ echo "selected"; } ?> value="8">Aug</option>
									<option <?php if(isset($_GET['month']) && $_GET['month'] == "9"){ echo "selected"; } ?> value="9">Sep</option>
									<option <?php if(isset($_GET['month']) && $_GET['month'] == "10"){ echo "selected"; }  ?> value="10">Oct</option>
									<option <?php if(isset($_GET['month']) && $_GET['month'] == "11"){ echo "selected"; }  ?> value="11">Nov</option>
									<option <?php if(isset($_GET['month']) && $_GET['month'] == "12"){ echo "selected"; }  ?> value="12">Dec</option>
									</select></div>		
									<div class="col-md-3 col-sm-12 col-12 mb-2 text-right"><select name="year" class="year_in_selectform form-control"> 
									<option selected >Year</option>
									<option <?php if($current_year =="2023"){ echo "selected"; } ?> value="2023">2023</option>
									<option <?php if($current_year =="2022"){ echo "selected"; } ?> value="2022">2022</option>
									<option <?php if($current_year =="2021"){ echo "selected"; } ?> value="2021">2021</option>
									<option <?php if($current_year =="2020"){ echo "selected"; } ?> value="2020">2020</option>
									<option <?php if($current_year =="2019"){ echo "selected"; } ?> value="2019">2019</option>
									
									</select>
									</div>

								</div>
								
								
									<table class="table table-striped table-bordered dom-jQuery-events">
										<thead>
											<tr>
											   <th>Date</th>
												<th>Time In</th>
												<th>Time Out</th>
												<th>Attendence</th>
											</tr>
										</thead>
										<tbody>
											@if(count($timesheet_list) > 0)
												@foreach($timesheet_list as $each)
													<tr>
														<td>{{$each->date_in}} </td>
														<td>{{$each->time_in}}</td>
														<td>{{$each->time_out}}</td>
														<td>Present</td>
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
	$('.month_in_selectform').on('change', function(){
		
		
	   window.location = "timesheet/?month="+$(this).val();
	});
	$('.year_in_selectform').on('change', function(){
	   window.location = "timesheet/?year="+$(this).val();
	});

</script>
@endsection