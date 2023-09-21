@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Verbal Exam</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Verbal Exam</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

                @foreach ( $upcomingDataVerbalExams as $verbal)
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
						<div class="card card-box">
							<div class="card-body">
								<h5 class="card-title weight-500">{{$verbal->title}}</h5>
								<p class="card-text">{{$verbal->description}}</p>
							</div>
							<img class="card-img-top" src="{{ asset('assets/images/verbal.png')}}" alt="Card image cap">
							<div class="card-body">
								<p class="card-text">Start time : {{$verbal->start_time}}</p>
                                <p class="card-text">End Time : {{$verbal->end_time}}</p>
								 <a href="{{ $verbal->vlink }}" target="_blank" class="card-link text-primary">Video Link</a>	
								 @if ($verbal->document != null)
									<a href="{{ asset('storage/' . $verbal->document) }}" class="card-link text-primary" download>Download File</a>	
								 @endif

								@if ( examcheck($verbal->id,'verbal Test') < 1 )
									<form action="{{ route('submisson') }}" method="POST" enctype="multipart/form-data">
											@csrf
											<div class="form-group">
												
												<input type="hidden" name="exam_id" value="{{ $verbal->id }}">
												<input type="hidden" name="bid" value="{{ $verbal->bid }}">
												<input type="hidden" name="type" value="{{ 'Verbal Test' }}">
												<input type="hidden" name="index_number" value="{{ Auth::user()->index_number }}">
												
												
											</div>	
											<button type="submit" class="btn btn-primary">Get Verbal Exam</button>	
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
 