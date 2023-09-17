@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Course Work</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Course Work</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
                @foreach ( $upcomingDataCourseWorks as $CourseWork)
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
						<div class="card card-box">
							<div class="card-body">
								<h5 class="card-title weight-500">{{$CourseWork->title}}</h5>
								<p class="card-text">{{$CourseWork->description}}</p>
							</div>
							<img class="card-img-top" src="{{ asset('assets/images/course-work.png')}}" alt="Card image cap">
							<div class="card-body">
								<p class="card-text">Start time : {{$CourseWork->start_time}}</p>
                                <p class="card-text">End Time : {{$CourseWork->end_time}}</p>
                                <a href="{{ asset('storage/' . $CourseWork->document) }}" class="card-link text-primary" download>Download File</a>								
							</div>
						</div>
					</div>
                @endforeach
				
			</div>


 @endsection           
@section('scripts')


@endsection
 