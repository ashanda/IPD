@extends('layouts.app')

@section('content')
<div class="main-container">
<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
						
							
							<div class="profile-info">
								<h5 class="text-left h5 mb-0"><span>Name:</span> {{ Auth::user()->fname .' '.Auth::user()->lname }}</h5>
								<p class="text-left text-muted font-14"><span>Coupon:</span>  {{ Auth::user()->coupen }}</p>
								<h5 class="mb-20 h5 text-blue">Contact Information</h5>
								<ul>
									<li>
										<span>Email Address:</span>
										{{ Auth::user()->email }}
									</li>
									<li>
										<span>Phone Number:</span>
										{{ Auth::user()->contact_number }}
									</li>
									
									<li>
										<span>Address:</span>
										{{ Auth::user()->address }}
									</li>
								</ul>
							</div>
							
						
						</div>
					</div>
					
				</div>
			</div>
		 @endsection           
@section('scripts')


@endsection	