<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="author" content=" ">

    <title>Scheduling App - Diverse Senior Care</title>
<link rel="icon" href="http://www.diverseseniorcare.com/wp-content/uploads/2020/07/favicon-150x150.png" sizes="32x32" />
<link rel="icon" href="http://www.diverseseniorcare.com/wp-content/uploads/2020/07/favicon.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="http://www.diverseseniorcare.com/wp-content/uploads/2020/07/favicon.png" />
<meta name="msapplication-TileImage" content="http://www.diverseseniorcare.com/wp-content/uploads/2020/07/favicon.png" />

   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/weather-icons/climacons.min.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.min.css')}}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/calendars/clndr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/meteocons/style.min.css')}}">
	
		<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/calendars/fullcalendar.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/calendars/fullcalendar.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	
	
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">


		@include('partial.staff_nav')

    <!-- ////////////////////////////////////////////////////////////////////////////-->
	
	
	<div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
      <div class="main-menu-content">
               <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="{{url('client/dashboard')}}"><i class="icon-home"></i>
		      <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span>
			  </a>
            
          </li>
         
		 
		 <li class="nav-item"><a href="{{url('client/today-schedule')}}"><i class="icon-calendar"></i><span class="menu-title" data-i18n="nav.form_repeater.main">Schedule</span></a>
          </li>
		    <li class="nav-item"><a href="{{url('client/past-visit')}}"><i class="icon-briefcase"></i><span class="menu-title" data-i18n="nav.form_repeater.main">Past Visits</span></a>
          </li>
		  
		  
		 
		  
        </ul>
      </div>
    </div>


	@yield('content')
       
	   
	@include('partial.footer')

	<script>
		 function deleteFunc(model,id){
			if(confirm("Are you sure you want to delete this?")){
			  window.location.href = "{{ url('/admin/deleteByID') }}/"+model+'/'+id;
			}
			else{
			  return false;
			}

		  }
	</script>
	@yield('footer-js')
</body>
</html>
