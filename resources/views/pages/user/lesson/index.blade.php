@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Lessons</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Lessons</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="container pd-0">
					<div class="timeline mb-30">
						<ul>
                        @foreach ( $upcomingDataLessons as $upcomingDataLesson)
                            <li>
								<div class="timeline-date">
									{{ \Carbon\Carbon::parse($upcomingDataLesson->publish_date)->format('d M Y') }}
								</div>
								<div class="timeline-desc card-box">
									<div class="pd-20">
										<h4 class="mb-10 h4">{{ $upcomingDataLesson->lesson_name }}</h4>
                                        
                                        <p>Start Time : {{ \Carbon\Carbon::parse($upcomingDataLesson->start_time)->format('g:i A') }} </p>
                                        <p>End Time : {{ \Carbon\Carbon::parse($upcomingDataLesson->end_time)->format('g:i A') }} </p>
                                        @if (\Carbon\Carbon::parse($upcomingDataLesson->publish_date)->isToday())
                                            <a href="{{ $upcomingDataLesson->vlink }}" class="btn btn-primary" target="_blank">Join Class</a>
                                        @else
                                            
                                        @endif
                                        
									</div>
								</div>
							</li>
                        @endforeach
							


							
							
							
						</ul>
					</div>
				</div>
			</div>


 @endsection           
@section('scripts')


@endsection
 