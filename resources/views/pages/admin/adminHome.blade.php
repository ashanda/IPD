@extends('layouts.app')

@section('preload')
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{ asset('assets/images/logo.jpg') }}" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>
@endsection
@section('content')
<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="{{ asset('assets/images/banner-img.png') }}" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">{{ Auth::user()->fname .' '.Auth::user()->lname  }}!</div>
						</h4>
						<p class="font-18 max-width-600">{{ smsBalance()}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
                            
							<div class="widget-data">
                                <a href="">
								<div class="h4 mb-0">Programme Shedule</div>
								<div class="weight-600 font-14"> + Programme Shedule</div>
                                </a>
							</div>
                            
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
                            
							<div class="widget-data">
                                <a href="">
								<div class="h4 mb-0">Payments</div>
								<div class="weight-600 font-14">Payments <span class="badge badge-primary badge-pill">14</span></div>
                                </a>
							</div>
                             
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
                            
							<div class="widget-data">
                                <a href="">
								<div class="h4 mb-0">Course metrials</div>
								<div class="weight-600 font-14">+ Course metrials</div>
                                </a>
							</div>
                             
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
                            
							<div class="widget-data">
                                <a href="">
								<div class="h4 mb-0">Certificate</div>
								<div class="weight-600 font-14">Certificate  <span class="badge badge-primary badge-pill">14</span></div>
                                 </a>
							</div>
                           
						</div>
					</div>
				</div>
			</div>

 @endsection           