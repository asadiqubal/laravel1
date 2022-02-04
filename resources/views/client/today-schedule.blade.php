@extends('layouts.client')


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
										<div id='fc-selectable1'></div>
										
										<?php
										 $scheduleArray = array();
										?>
										@if(count($record))
											<?php
												$i=1;
												$j = 0;
												$scheduleArray = array();
											?>
											@foreach($record as $eachval)
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
														<p><b>Status: </b> <?php if($eachval['status'] == 0){ ?>To Do <?php }else{ ?><span style="color:green;font-weight:bold;">Done</span>  <?php } ?></p>
													<!--<p><b>Client:</b> {{$clientDetail['name']}}</p>
													<p><b>Client Address:</b>  {{$clientDetail['address']}}</p>-->
													<p><b>Visitor:</b>  {{$staffDetail['name']}} ( {{$staffDetail['employee_code']}} )</p>
												
													<p><b>Admin Notes:</b> @if($eachval['admin_notes']){{$eachval['admin_notes']}} @else {{"NA"}} @endif </p>
													<p><b>Staff Notes:</b> @if($eachval['staff_notes']){{$eachval['staff_notes']}} @else {{"NA"}} @endif </p>
													<p><b>Client Notes:</b> @if($eachval['client_notes']){{$eachval['client_notes']}} @else {{"NA"}} @endif </p>
													
													<?php
														if(empty($eachval['client_notes'])){
													?>

														<!--<button  class="btn btn-primary Mybtn_show">Add Note</button>
-->
														<form id="MyForm" action="{{url('client/submitNotesForm')}}" method="post">
														@csrf
															<input type="hidden" name="id" value="{{$eachval['id']}}">
															<div class="form-group">
																<label for="client_notes">Notes</label>
																<textarea required id="client_notes" placeholder="Add your notes" class="form-control" name="client_notes">@if(isset($timesheetDetail->client_notes) && !empty($timesheetDetail->client_notes)){{$timesheetDetail->client_notes}}@else{{old('client_notes')}}@endif</textarea>
																
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

#MyForm{

width: 100%;
    border: 1px solid #ccc;
    padding: 14px;
    margin-top: 13px;
}	
</style>
	<script>
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

            },
*/
            editable: !0,

            eventLimit: !0,
            events: [
				<?php
					if(count($record) > 0){
						foreach($record as $each){
							$staffDetail = App\Helpers\CommonHelper::getStaffDetails($each->staff_id);
							
							$clientDetail = App\Helpers\CommonHelper::getClientDetails($each->client_id);
				?>
					{ 
					title: "<?php echo $each['time_in']; ?>-<?php echo $each['time_out']; ?> (<?php echo $staffDetail['name']; ?>)", 
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
			 
			 $(document).on('click','.Mybtn_show',function(){
				 $('#MyForm').css("display","block");
				  $('.Mybtn_show').addClass('Mybtn_hide');
				 $('.Mybtn_show').removeClass('Mybtn_show');
				
			 });
			 $(document).on('click','.Mybtn_hide',function(){
				 $('#MyForm').css("display","none");
				 $('.Mybtn_hide').addClass('Mybtn_show');
				 $('.Mybtn_hide').removeClass('Mybtn_hide');
			 });
			


        
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

 
