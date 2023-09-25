@extends('layouts.app-auth')

@section('content')

<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="{{ env('APP_URL') }}">
					<img src="{{ asset('assets/images/app-logo.png') }}" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="{{ route('register') }}">Register</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{ asset('assets/images/login-page-img.png') }}" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login to {{ env('APP_NAME') }}</h2>
						</div>

						<form method="POST" action="{{ route('login') }}">
							@csrf
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn active">
										<input type="radio" name="options" id="user" data-target="contact_number">
										<div class="icon"><img src="{{ asset('assets/images/person.svg') }}" class="svg" alt=""></div>
										<span>I'm</span>
										Student
									</label>
									<label class="btn">
										<input type="radio" name="options" id="admin" data-target="email">
										<div class="icon"><img src="{{ asset('assets/images/briefcase.svg') }}" class="svg" alt=""></div>
										<span>I'm</span>
										Instructor
									</label>
								</div>
							</div>
							@if(session('error'))
							<div class="alert alert-danger">
								{{ session('error') }}
							</div>
							@endif
							<div class="input-group custom">
								<input id="contact_number" type="text" class="form-control form-control-lg @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" autocomplete="contact_number" autofocus placeholder="Your Phone Number">
								<input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Username" style="display: none;">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="**********">

								<div class="input-group-append custom">
									<span class="input-group-text" onclick="password_show_hide();">
										<i class="fa fa-eye" id="show_eye"></i>
										<i class="fa fa-eye-slash d-none" id="hide_eye"></i>
									</span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6 d-none">
									<div class="custom-control custom-checkbox">
										<input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password text-left" id="forget"><a href="{{ route('password.request') }}">Forgot Password</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										<button type="submit" class="btn btn-primary btn-lg btn-block">
											{{ __('Login') }}
										</button>

									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('register') }}">Don't have an account?</a>
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

	@section('scripts')
	<script>
		$(document).ready(function() {
			// Initially hide the email input field
			$("#email").hide();
			$("#email").removeAttr("required"); // Remove 'required' attribute
			$("#forget").hide();
			// Hide the contact_number input field initially (since "I'm Student" is selected by default)
			$("#contact_number").show();
			$("#forget").show();
			$("#contact_number").attr("required", "required"); // Add 'required' attribute

			// Listen for radio button changes
			$("input[type='radio']").change(function() {
				var targetId = $(this).data("target");
				// Hide both input fields
				$("#contact_number, #email, #forget").hide();
				// Remove 'required' attribute from both input fields
				$("#contact_number, #email").removeAttr("required");
				// Show the selected input field
				$("#" + targetId).show();
				// Add 'required' attribute to the selected input field
				$("#" + targetId).attr("required", "required");
			});
		});

		// password show hide 
		function password_show_hide() {
			var x = document.getElementById("password");
			var show_eye = document.getElementById("show_eye");
			var hide_eye = document.getElementById("hide_eye");
			hide_eye.classList.remove("d-none");
			if (x.type === "password") {
				x.type = "text";
				show_eye.style.display = "none";
				hide_eye.style.display = "block";
			} else {
				x.type = "password";
				show_eye.style.display = "block";
				hide_eye.style.display = "none";
			}
		}
	</script>
	@endsection