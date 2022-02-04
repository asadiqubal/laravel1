<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="author" content=" ">
<link rel="icon" href="http://www.diverseseniorcare.com/wp-content/uploads/2020/07/favicon-150x150.png" sizes="32x32" />
<link rel="icon" href="http://www.diverseseniorcare.com/wp-content/uploads/2020/07/favicon.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="http://www.diverseseniorcare.com/wp-content/uploads/2020/07/favicon.png" />
<meta name="msapplication-TileImage" content="http://www.diverseseniorcare.com/wp-content/uploads/2020/07/favicon.png" />

    <title>Scheduling App - Diverse Senior Care</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
	    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.min.css')}}">
    <!-- END ROBUST CSS-->
	
	
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/calendars/clndr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/meteocons/style.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/calendars/fullcalendar.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/calendars/fullcalendar.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	


    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">


	<link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.min.css')}}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/login-register.min.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

		@include('partial.nav')

    <!-- ////////////////////////////////////////////////////////////////////////////-->
	
	
	<div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
      <div class="main-menu-content">
               <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="{{url('admin/dashboard')}}"><i class="icon-home"></i>
		      <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span>
			  </a>
            
          </li>
         
		 
		 
		  <li class=" nav-item"><a href="{{url('admin/schedule')}}"><i class="icon-calendar"></i><span class="menu-title" data-i18n="nav.form_repeater.main">Schedule</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="{{url('admin/add-schedule')}}" data-i18n="nav.menu_levels.second_level">Add New</a>
              </li>
			  <li><a class="menu-item" href="{{url('admin/schedule')}}" data-i18n="nav.menu_levels.second_level">Calendar</a>
              </li>
             
            </ul>
          </li>
		  <li class=" nav-item"><a href="{{url('admin/timesheet')}}"><i class="icon-clock"></i><span class="menu-title" data-i18n="nav.form_repeater.main">Timesheet</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="{{url('admin/add-timesheet')}}" data-i18n="nav.menu_levels.second_level">Add New</a>
              </li>
			  <li><a class="menu-item" href="{{url('admin/timesheet')}}" data-i18n="nav.menu_levels.second_level">List</a>
              </li>
             
            </ul>
          </li>
		  
		  
		  <li class=" nav-item"><a href="{{url('admin/companies-list')}}"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.menu_levels.main">Staff</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="{{url('admin/add-staff')}}" data-i18n="nav.menu_levels.second_level">Add New</a>
              </li>
			  <li><a class="menu-item" href="{{url('admin/staff-list')}}" data-i18n="nav.menu_levels.second_level">List</a>
              </li>
             
            </ul>
          </li>
		  
		  <li class="nav-item"><a href="{{url('admin/client-list')}}"><i class="icon-briefcase"></i><span class="menu-title" data-i18n="nav.form_repeater.main">Clients</span></a>
          </li>
		  <li class="nav-item"><a href="{{url('admin/marketing')}}"><i class="icon-share"></i><span class="menu-title" data-i18n="nav.form_repeater.main">Marketing</span></a>
          </li>
		<!--<li class="nav-item"><a href="rfq-range.html"><i class="icon-shuffle"></i><span class="menu-title" data-i18n="nav.form_repeater.main">RFQ # Range</span></a>
          </li>
		  <li class="nav-item"><a href="rfq-status.html"><i class="icon-check"></i><span class="menu-title" data-i18n="nav.form_repeater.main">RFQ Status</span></a>
          </li>
		  <li class=" nav-item"><a href="companies-list.html"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.menu_levels.main">Companies</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="add-company.html" data-i18n="nav.menu_levels.second_level">Add New</a>
              </li>
			  <li><a class="menu-item" href="companies-list.html" data-i18n="nav.menu_levels.second_level">List</a>
              </li>
             
            </ul>
          </li>
		
		 <li class=" nav-item"><a href="companies-user-list.html"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.menu_levels.main">Company Users</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="add-company-users.html" data-i18n="nav.menu_levels.second_level">Add New</a>
              </li>
			  <li><a class="menu-item" href="companies-user-list.html" data-i18n="nav.menu_levels.second_level">List</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="Industries.html"><i class="icon-support"></i><span class="menu-title" data-i18n="nav.menu_levels.main">Settings</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="payments-terms.html" data-i18n="nav.menu_levels.second_level">Payment Terms</a>
              </li>
			  <li><a class="menu-item" href="Industries.html" data-i18n="nav.menu_levels.second_level">Industries</a>
              </li>
			  <li><a class="menu-item" href="roles.html" data-i18n="nav.menu_levels.second_level">Roles</a>
              </li>
            </ul>
          </li>	-->
		  
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
