@extends('layouts.login')

@section('content')


<section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <div class="p-1"><img src="app-assets/images/logo.png" alt="Scheduling System" class="img-fluid"></div>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Login with Diverse Senior Care</span></h6>
                </div>
                <div class="card-content">
                    <div class="card-body">
					
						<form method="POST" action="{{ route('login') }}">
                        @csrf
						
						<fieldset class="form-group position-relative has-icon-left mb-0">
							<input type="text" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror" id="user-name" placeholder="Your Username" name="email" value="{{ old('email') }}" required>
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
							<input type="password" class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" id="user-password" name="password" placeholder="Enter Password" required>
							<div class="form-control-position">
								<i class="fa fa-key font-medium-4"></i>
							</div>
							
							 @error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</fieldset>
						
						<div class="form-group row">
							<div class="col-md-6 col-12 text-center text-md-left">
								<fieldset>
									<input class="chk-remember" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									<label for="remember-me"> Remember Me</label>
								</fieldset>
							</div>
							<div class="col-md-6 col-12 text-center text-md-right">
								@if (Route::has('password.request'))
                                    <a class="card-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
							
							</div>
						</div>
						<button type="submit" class="btn btn-info btn-lg btn-block">
							{{ __('Login') }}
						</button>

                        
						
                    </form>
					
                       
					   
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
