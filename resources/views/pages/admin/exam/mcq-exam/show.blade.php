@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Questions List</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ currentHome() }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Questions List</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
                	<div class="page-header">
   
                            <div class="col-md-4 col-sm-12">
                                <div class="dropdown">
                                    <a href="{{ url('mcq-exams/add_question/'.$exam->id)  }}" class="btn btn-dark">New questions</a>
                                </div>
                            </div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Questions: {{ $exam->exam_question }}</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th>#No</th>
                                    <th>Answer</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $question)
                                <tr>
                                    <td>{{ $question->descriptions }}</td>
                                    <td>{{ $question->answer }}</td>
                                    <!-- <td>Add actions for each question here</td> -->
                                </tr>
                                @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@endsection