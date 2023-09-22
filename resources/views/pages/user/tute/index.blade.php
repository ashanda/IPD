@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Tute</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Tute</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
                @foreach ( $tutes as $Tute)
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
						<div class="card card-box">
							<div class="card-body">
								<h5 class="card-title weight-500">{{$Tute->title}}</h5>
								<p class="card-text">{{$Tute->description}}</p>
							</div>
							<img class="card-img-top" src="{{ asset('assets/images/course-work.png')}}" alt="Card image cap">
							<div class="card-body">
								
                                <a href="{{ asset('storage/app/public/'. $Tute->document) }}" class="card-link text-primary" download>Download Tute</a>								
							</div>
						</div>
					</div>
                @endforeach
				
			</div>


 @endsection           
@section('scripts')


@endsection
 