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
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Course Work</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
					<div class="row">
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
                                <a href="{{ asset('storage/'. $CourseWork->document) }}" class="card-link text-primary" download>Download File</a>	
								@if ( examcheck($CourseWork->id,'Course Work') < 1 )
									<form action="{{ route('submisson') }}" method="POST" enctype="multipart/form-data">
											@csrf
											<div class="form-group">
												<label>Upload Your Work</label>
												<input type="hidden" name="exam_id" value="{{ $CourseWork->id }}">
												<input type="hidden" name="bid" value="{{ $CourseWork->bid }}">
												<input type="hidden" name="type" value="{{ 'Course Work' }}">
												<input type="hidden" name="index_number" value="{{ Auth::user()->index_number }}">
												<input type="file" class="form-control-file form-control height-auto" name="document">
												
											</div>	
											<button type="submit" class="btn btn-primary">Upload</button>	
									</form>	
								@else
									
								@endif
											
							</div>
						</div>
					</div>
                @endforeach
				</div>
			</div>


 @endsection           
@section('scripts')


@endsection
 