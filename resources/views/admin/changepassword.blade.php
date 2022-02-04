@extends('layouts.app')

@section('content')

<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
			  <div class="content-header-left col-md-6 col-12 mb-1">
				<h3 class="content-header-title">Change password</h3>
			  </div>
			  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
				<div class="breadcrumb-wrapper col-12">
				  <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">Change password
					</li>
				  </ol>
				</div>
			  </div>
        </div>
        <div class="content-body"><!-- Sales stats -->
		
		  


							<div class="panel-body">
								@if (session('error'))
									<div class="alert alert-danger">
										{{ session('error') }}
									</div>
								@endif
									@if (session('success'))
										<div class="alert alert-success">
											{{ session('success') }}
										</div>
									@endif
								<form class="form-horizontal" method="POST" action="{{ url('admin/changePassword') }}">
									{{ csrf_field() }}

									<div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
										<label for="new-password" class="col-md-12 control-label">Current Password</label>

										<div class="col-md-12">
											<input id="current-password" type="password" class="form-control" name="current-password" required>

											@if ($errors->has('current-password'))
												<span class="help-block">
													<strong>{{ $errors->first('current-password') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
										<label for="new-password" class="col-md-12 control-label">New Password</label>

										<div class="col-md-12">
											<input id="new-password" type="password" class="form-control" name="new-password" required>

											@if ($errors->has('new-password'))
												<span class="help-block">
													<strong>{{ $errors->first('new-password') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group">
										<label for="new-password-confirm" class="col-md-12 control-label">Confirm New Password</label>

										<div class="col-md-12">
											<input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-12 col-md-offset-4">
											<button type="submit" class="btn btn-primary">
												Change Password
											</button>
										</div>
									</div>
								</form>
							</div>
					</div>
				</div>
			</div>
		
		
@endsection