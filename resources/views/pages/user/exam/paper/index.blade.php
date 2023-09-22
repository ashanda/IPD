@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Paper Exam</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Paper Exam</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

                @foreach ( $upcomingDataPaperExams as $Paper)
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
						<div class="card card-box">
							<div class="card-body">
								<h5 class="card-title weight-500">{{$Paper->title}}</h5>
								<p class="card-text">{{$Paper->description}}</p>
							</div>
							<img class="card-img-top" src="{{ asset('assets/images/course-work.png')}}" alt="Card image cap">
							<div class="card-body">
								<p class="card-text">Start time : {{$Paper->start_time}}</p>
                                <p class="card-text">End Time : {{$Paper->end_time}}</p>
                                <a href="{{ asset('storage/'. $Paper->document) }}" class="card-link text-primary" download>Download File</a>	
								@if ( examcheck($Paper->id,'Paper Test') < 1 )
									<form action="{{ route('submisson') }}" method="POST" enctype="multipart/form-data">
											@csrf
											<div class="form-group">
												<label>Upload Your Answers</label>
												<input type="hidden" name="exam_id" value="{{ $Paper->id }}">
												<input type="hidden" name="bid" value="{{ $Paper->bid }}">
												<input type="hidden" name="type" value="{{ 'Paper Test' }}">
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


 @endsection           
@section('scripts')


@endsection
 