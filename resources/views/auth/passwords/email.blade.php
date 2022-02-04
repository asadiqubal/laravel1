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
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Reset Password</span></h6>
                </div>
                <div class="card-content">
					<div class="card-body">
							@if (session('status'))
								<div class="alert alert-success" role="alert">
									{{ session('status') }}
								</div>
							@endif

							<form method="POST" action="{{ route('password.email') }}">
								@csrf

								<div class="form-group row">
									<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

									<div class="col-md-6">
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-4">
										<button type="submit" class="btn btn-primary">
											{{ __('Send Password Reset Link') }}
										</button>
									</div>
								</div>
							</form>
						</div>
                </div>
                
            </div>
        </div>
    </div>
</section>



@endsection
