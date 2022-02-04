@extends('layouts.login')

@section('content')


<section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <div class="p-1"><img src="{{asset('/app-assets/images/logo.png')}}" alt="Scheduling System" class="img-fluid"></div>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Login with Diverse Senior Care</span></h6>
                </div>
                <div class="card-content">
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
						<p class="mb-0 font-medium-1"  style="line-height:18px">Please login with your email and temparray password sent on your regitered email.</p><br>
						<form class="form-horizontal form-simple" method="POST" action="{{ url('/staff/templogin') }}" novalidate>
                        @csrf
						
								
						<fieldset class="form-group position-relative has-icon-left mb-0">
							<input type="email" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror" id="user-name" placeholder="Your Username" name="email" value="{{$username}}" required>
							<div class="form-control-position">
								<i class="ft-user font-medium-4"></i>
							</div>
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</fieldset>
						<fieldset class="form-group position-relative has-icon-left">
							<input type="password" class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" id="user-password" name="password" value="{{$password}}" placeholder="Temporary Password" required>
							<div class="form-control-position">
								<i class="fa fa-key font-medium-4"></i>
							</div>
							
							 @error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</fieldset>
						
						
						
						<button type="submit" class="btn btn-info btn-lg btn-block welocme_btn">Sign In</button>
                        
						
                    </form>
					
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection


@section('footer-js')

    <!-- END PAGE LEVEL JS-->
	<script>
	   $(document).ready(function() {
		     $('.welocme_btn').click(function(){
			    
				$('.Welcome_box').hide();
				//$('.header_text').hide();
				$('.change_password').show();
			 
			 })
	  });
	</script>
  
@endsection