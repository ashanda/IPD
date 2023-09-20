@extends('layouts.app')

@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="container pd-0">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Exams</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.html">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Exams</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					@if (paymentCheck() == 1)
						<div class="contact-directory-list">
						<ul class="row min-height-20px">
							<li class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
								<div class="contact-directory-box">
									<div class="contact-dire-info text-center">
										
										<div class="contact-name">
											<h4>MCQ Exam</h4>
											
										</div>
										
										<div class="profile-sort-desc">
											Assessment using questions with multiple answer options, where test-takers choose the correct one, assessing knowledge, and understanding.
										</div>
									</div>
									<div class="view-contact">
										<a href="{{ route('usermcqexam') }}">Get Exam</a>
									</div>
								</div>
							</li>
							<li class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
								<div class="contact-directory-box">
									<div class="contact-dire-info text-center">
										
										<div class="contact-name">
											<h4>Paper Exam</h4>
											
										</div>
										
										<div class="profile-sort-desc">
											Traditional assessment method using physical printed sheets for answering questions, often handwritten, covering various subjects and levels of education.
										</div>
									</div>
									<div class="view-contact">
										<a href="{{ route('userpaperexam') }}">Get Exam</a>
									</div>
								</div>
							</li>
							<li class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
								<div class="contact-directory-box">
									<div class="contact-dire-info text-center">
										
										<div class="contact-name">
											<h4>Verbal Exam</h4>
											
										</div>
										
										<div class="profile-sort-desc">
											Assessment method that evaluates spoken language skills, typically involving oral interviews, language proficiency tests, or communication assessments.
										</div>
									</div>
									<div class="view-contact">
										<a href="{{ route('userverbalexam') }}">Get Exam</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
					@else
						<h3>{{ 'You are not pay full course fee' }}</h3>
					@endif
					
				</div>
			</div>
 @endsection           
@section('scripts')


@endsection