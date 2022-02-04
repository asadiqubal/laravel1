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
					
							<div id="error" class="text-danger text-center">
								<p>You have already completed your account setup. <a href="{{url('/login')}}">Click here</a> to go to login page</p>
							</div>
					
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>



@endsection
