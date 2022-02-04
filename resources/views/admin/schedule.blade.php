@extends('layouts.app')


@section('content')
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
			  <div class="content-header-left col-md-6 col-12 mb-1">
				<h3 class="content-header-title">Schedule</h3>
			  </div>
			  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
				<div class="breadcrumb-wrapper col-12">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item active">Schedule</li>
				  </ol>
				</div>
			  </div>
        </div>
        <div class="content-body"><!-- Sales stats -->
		
				<section id="advance-examples">
				    <div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-content collapse show">
									<div class="card-body">
										<div id='fc-selectable1'></div>
										
										<?php
										 $scheduleArray = array();
										?>
										@if(count($schedule_list))
											<?php
												$i=1;
												$j = 0;
												$scheduleArray = array();
											?>
											@foreach($schedule_list as $eachval)
												<?php
													 $scheduleArray[$j]['id'] = $eachval['id'];
													$scheduleArray[$j]['date_in'] = $eachval['date_in'];
													$scheduleArray[$j]['time_in'] = $eachval['time_in'];
													$scheduleArray[$j]['time_out'] = $eachval['time_out'];

													
													$staffDetail = App\Helpers\CommonHelper::getStaffDetails($eachval->staff_id);
							
													$clientDetail = App\Helpers\CommonHelper::getClientDetails($eachval->client_id);
							
												?>
												<?php
												$i++;
												$j++;
											?>
											<div id="myModal_<?php echo $eachval['id']; ?>" class="modal fade" role="dialog">
											  <div class="modal-dialog">
											
											
												<div class="modal-content" style="top: 120px;">
														<div class="modal-header" style="float: right;display: block;">
											<button style="float: right;top: -3px;border: none;color: red;" type="button" class="close" data-dismiss="modal">&times;</button>      </div>

												  <div class="modal-body">
													<p><b>{{ date('d M Y',strtotime($eachval['date_in']))}} ({{$eachval['time_in']}} - {{$eachval['time_out']}})</b></p>
													<p><b>Client:</b> {{$clientDetail['name']}}</p>
													<p><b>Client Address:</b> {{$clientDetail['address']}}</p>
													<p><b>Visitor:</b> {{$staffDetail['name']}} ( {{$staffDetail['employee_code']}} )</p>
													<p><b>Status:</b> <?php if($eachval['status'] == 0){ ?>To Do <?php }else{ ?> Done <?php } ?></p>
													<p><b>Admin Notes:</b> @if($eachval['admin_notes']){{$eachval['admin_notes']}} @else {{"NA"}} @endif </p>
													<p><b>Staff Notes:</b> @if($eachval['staff_notes']){{$eachval['staff_notes']}} @else {{"NA"}} @endif </p>
													<p><b>Client Notes:</b> @if($eachval['client_notes']){{$eachval['client_notes']}} @else {{"NA"}} @endif </p>
													
													
												<a class="btn btn-danger" onclick="deleteFunc('Schedule',{{$eachval['id']}})" href="#">Delete</a>
													
													
												  </div>
												</div>
											
											  </div>
											</div>
											@endforeach
										@endif
									</div>
								</div>
								
								
							</div>
						</div>
					</div>
				
											
				</section>	
	
        </div>
      </div>
    </div>
	
@endsection
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   
@section('footer-js')
	<style>
		span.fc-time {
    display: none;
}
.fc-event span {
    font-size: 12px;
    color: #FFF;
    font-weight: 100;
}
.fc-day-top{
    text-align:center;
    background:#ddd;
    cursor:pointer;
}
	</style>
	<script>
	
	$(document).on('click', '.fc-day-number', function(event) {
	   
   var target = event.target;
   var day = parseInt(target.innerHTML);
   var date = $(target).parent('td').attr('data-date');
   var url = 'http://www.diverseseniorcare.com/scheduling/public/admin/add-schedule?booking_date=' + date;
   var win = window.open(url,'_self');
   win.focus();
 })



		        $("#fc-selectable1").fullCalendar({

            header: { left: "prev,next today", center: "title", right: "month,agendaWeek,agendaDay" },

            //defaultDate: "2016-06-12",

            selectable: !0,

            selectHelper: !0,
/*
            select: function (t, e) {

                var a,

                    n = prompt("Event Title:");

                n && ((a = { title: n, start: t, end: e }), $("#fc-selectable").fullCalendar("renderEvent", a, !0)), $("#fc-selectable").fullCalendar("unselect");

            },*/

            editable: !0,

            eventLimit: !0,
            events: [
				<?php
					if(count($schedule_list) > 0){
						foreach($schedule_list as $each){
							$staffDetail = App\Helpers\CommonHelper::getStaffDetails($each->staff_id);
							
							$clientDetail = App\Helpers\CommonHelper::getClientDetails($each->client_id);
				?>
					{ 
					title: "<?php echo $each['time_in']; ?>-<?php echo $each['time_out']; ?> (<?php echo $clientDetail['name']; ?>)", 
					start: "<?php echo $each['date_in']; ?>T<?php echo $each['time_in']; ?>", 
					end: "<?php echo $each['date_in']; ?>T<?php echo $each['time_out']; ?>",
					 url: '<?php echo $each['id'];?>',
					 data:'aaaa'
					},
				<?php
						}
					}
				?>

            ],

        });
		
		 $(document).ready(function(){
        
            //$('.fc-day-top').prepend('<b>+</b>');
        
        
         $(document).on('click','.fc-h-event ,.fc-event',function(){
            var id = $(this).attr('href');
           $('#myModal_'+id).modal('show');
            return false;
        });
        $(document).on('click','.fc-list-event-title a',function(e){
            e.preventDefault();
            var id = $(this).attr('href');
           $('#myModal_'+id).modal('show');
         
            return false;
        });
        
        $(document).on('click','.close',function(e){
            e.preventDefault();
           $('.modal').modal('hide');
         
            return false;
        });
    })

	</script>
@endsection

 
