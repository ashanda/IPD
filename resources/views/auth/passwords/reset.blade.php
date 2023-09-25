@extends('layouts.app-auth')

@section('content')
<body>
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="{{ route('login') }}">
					<img src="{{ asset('assets/images/app-logo.png')}}" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="{{ route('login') }}">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<img src="{{ asset('assets/images/forgot-password.png')}}" alt="">
				</div>
				<div class="col-md-6">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Reset Password</h2>
						</div>
						<h6 class="mb-20">Enter your new password, confirm and submit</h6>
						<form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
						<div class="input-group custom">

								<input id="contact_number" type="tel" class="form-control form-control-lg  @error('contact_number') is-invalid @enderror" placeholder="Contact Number" name="contact_number" value="{{ $email ?? old('contact_number') }}" required autocomplete="contact_number" autofocus>

								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>	
                        
                        <div class="input-group custom">

								
                                <input id="password" type="password" placeholder="New Password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>

							<div class="input-group custom">
                                <input id="password-confirm" type="password" placeholder="Confirm New Password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
								
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col-5">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
										-->
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            {{ __('Reset Password') }}
                                        </button>
										
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
