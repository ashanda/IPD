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
			
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{ asset('assets/images/login-admin.png') }}" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login to {{ env('APP_NAME') }}</h2>
						</div>
						<form method="POST" action="{{ route('login') }}">
                            @csrf
						
							<div class="input-group custom">
                                <input  type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Username">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
							<div class="input-group custom">
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
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

        // Hide the contact_number input field initially (since "I'm Student" is selected by default)
        $("#contact_number").show();
        $("#contact_number").attr("required", "required"); // Add 'required' attribute

        // Listen for radio button changes
        $("input[type='radio']").change(function() {
            var targetId = $(this).data("target");
            // Hide both input fields
            $("#contact_number, #email").hide();
            // Remove 'required' attribute from both input fields
            $("#contact_number, #email").removeAttr("required");
            // Show the selected input field
            $("#" + targetId).show();
            // Add 'required' attribute to the selected input field
            $("#" + targetId).attr("required", "required");
        });
    });
</script>
@endsection
