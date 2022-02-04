<?php
		/*
		?>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
		<?php
		*/
		?>
		
		
		    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item">
			<a class="navbar-brand" href="{{url('admin/dashboard')}}"><img src="{{asset('app-assets/images/logo-icon.png')}}" alt="Quoteside" class="brand-logo" > <span class="brand-text"><img src="{{asset('app-assets/images/logo-text.png')}}" alt="Quoteside" class="img-fluid w-75"></span></a>
			</li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
              
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
              
            </ul>
            <ul class="nav navbar-nav float-right">         
              
              <li class="dropdown dropdown-user nav-item">
			  
			    <a id="navbarDropdown" class="dropdown-toggle nav-link dropdown-user-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					<span class="avatar avatar-online"><i class="icon-user font-medium-3"></i></span><span class="user-name">{{ Auth::user()->name }}</span>
				</a>
			  
			  
			  
                <div class="dropdown-menu dropdown-menu-right">
				<?php
					$role = Auth::user()->role;
					if($role == "1"){
				?>
						<a class="dropdown-item" href="{{url('admin/changePassword')}}"><i class="ft-lock"></i>Change Password</a>
				<?php
					}elseif($role == "2"){
				?>
						<a class="dropdown-item" href="{{url('staff/changePassword')}}"><i class="ft-lock"></i>Change Password</a>
				<?php
					}else{
				?>
						<a class="dropdown-item" href="{{url('client/changePassword')}}"><i class="ft-lock"></i>Change Password</a>
				<?php
					}
				?>
				
			      <div class="dropdown-divider"></div>
				  
					<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();">
					<i class="ft-power"></i> 	{{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				  
				  
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>