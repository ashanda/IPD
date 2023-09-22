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
					<li><a href="{{ route('login') }}">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{ asset('assets/images/register-page-img.png') }}" alt="">
				</div>

                <div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Register to {{ env('APP_NAME') }}</h2>
						</div>
							<form method="POST" action="{{ route('register') }}" class="">
								@csrf
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Email Address*</label>
											<div class="col-sm-8">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Contact Number*</label>
											<div class="col-sm-8">
												<input type="text" name="contact_number" class="form-control" required autocomplete="contact_number" autofocus pattern="[0-9][0-9]*">
											</div>
										</div>
                                      <div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">First Name*</label>
											<div class="col-sm-8">
                                                 <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>
												
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-sm-4 col-form-label">Last Name*</label>
											<div class="col-sm-8">
												<input id="name" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>
											</div>
										</div>
										 <div class="form-group row">
											<label class="col-sm-4 col-form-label">Address*</label>
											<div class="col-sm-8">
												<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
											</div>
										</div>
										<div class="form-group row align-items-center">
											<label class="col-sm-4 col-form-label">Birth Day*</label>
											<div class="col-sm-8">
												<input class="form-control date-picker" placeholder="Select Date" type="text" name="dob" required>
												<input type="hidden" name="index_number" value="{{ substr(Illuminate\Support\Str::uuid(), 0, 10) }}" required>
												
											</div>
										</div>
										<div class="form-group row align-items-center">
											<label class="col-sm-4 col-form-label">Batch*</label>
											<div class="col-sm-8">
                                                <select class="custom-select form-control" data-np-autofill-field-type="batch" name="batch" required>
													
													
													@foreach (getAllactiveBatch() as $batch)
                                                        <option value="{{ $batch->id }}">{{ $batch->bname }}</option>
													@endforeach
                                                    

                                                </select>
											</div>
										</div>
										<div class="custom-control custom-checkbox mt-4">
											<input class="custom-control-input" type="checkbox" id="customCheck8" onclick="toggleCouponInput()">
											<label class="custom-control-label" for="customCheck8">I have coupon</label>
										</div>
										<div class="form-group row align-items-center" id="couponInput" style="display: none;">
											<label class="col-sm-4 col-form-label">Coupon</label>
											<div class="col-sm-8">
                                               <input class="form-control" placeholder="I have coupon" type="text" name="coupen_code" >
											</div>
										</div>
                                        <div class="custom-control custom-checkbox mt-4 d-none">
                                           
											
											<label class="custom-control-label" for="customCheck1">I have read and agreed to the terms of services and privacy policy</label>
										</div>
                                         <button type="submit" class="custom-control-input">
                                                {{ __('Register') }}
                                         </button>
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
                                            {{ __('Create Account') }}
                                        </button>
										
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('login') }}">Already have an account?</a>
									</div>
								</div>
							</div>
								
								
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    

@endsection
@section('scripts')
<script>
        function toggleCouponInput() {
            var checkbox = document.getElementById("customCheck8");
            var couponInput = document.getElementById("couponInput");

            if (checkbox.checked) {
                couponInput.style.display = "flex";
            } else {
                couponInput.style.display = "none";
            }
        }
    </script>
@endsection