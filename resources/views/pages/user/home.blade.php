@extends('layouts.app')

@section('content')
<style type="text/css">
	
</style>
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
<div class="main-container">
		<div class="pd-ltr-20">
		  <div class="row">
			@php
				$responseData = json_decode(upcoming()->getContent(), true);
				
				$eventTypes = [
					'lt' => 'Lesson',
					'mt' => 'MCQ Test',
					'pt' => 'Paper Test',
					'ct' => 'Course Work',
					'vt' => 'Verbal Exam',
				];
				
			@endphp


			@if (endCourse() === 1)
		   <div class="col-sm-12 mb-30">
			@else
			<div class="col-sm-8 mb-30">
			@endif
			<div class="card-box pd-20 height-100-p mb-30">
				@if (endCourse() === 0)
					@if (expireCheck() === 0 && paymentCheck() === 0)
					<div class="alert alert-danger alert-dismissible fade show mb-30" role="alert">
								<strong>Payment due.</strong>Please make payment promptly. Thank you.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
					 </button>
				</div>
				@else
					
				@endif
				@endif
				
				
				<div class="row align-items-center">
					
					
						

						@if (endCourse() === 1)
						<div class="col-md-7">
							<div style="text-align: center;">
								<img src="{{ asset('assets/images/certificate.png') }}" alt="">
							</div>

						@else
						<div class="col-md-7">
							<div class="panel panel-danger">
							<div class="panel-heading">
								<h3 class="panel-title font-14">
									<span class="glyphicon  glyphicon-calendar"></span> Upcomming Activity
								</h3>
							</div>
							<hr>
							<div class="panel-body">
								<ul class="media-list font-14" style="overflow: auto; max-height: 350px;">
								@php
									$hasData = false;
								@endphp

								@foreach ($responseData as $dataType => $data)
									@if (!empty($data))
										@php
											$hasData = true;
										@endphp
										@foreach ($data as $item)
											<li class="media">
												<div class="media-left">
													<div class="panel panel-danger text-center date">
														<div class="panel-heading month font-14">
															<span class="panel-title strong">
																{{ \Carbon\Carbon::parse($item['lp'] ?? $item['mp'] ?? $item['pp'] ?? $item['cp'] ?? $item['vpb'])->format('M') }}
															</span>
														</div>
														<div class="panel-body day text-danger font-14">
															{{ \Carbon\Carbon::parse($item['lp'] ?? $item['mp'] ?? $item['pp'] ?? $item['cp'] ?? $item['vpb'])->format('d') }}
														</div>
													</div>
												</div>
												<div class="media-body">
													<h4 class="media-heading font-14">
														@php
															$eventTypeKey = array_key_first($item);
															$eventName = $eventTypes[$eventTypeKey] ?? 'Unknown Event';
														@endphp
														{{ $eventName }}
													</h4>
													<p class="mb-0">
														{{ $item['lt'] ?? $item['mt'] ?? $item['pt'] ?? $item['ct'] ?? $item['vt'] }}.
													</p>
												</div>
											</li>
											<hr />
										@endforeach
									@endif
								@endforeach

								@if (!$hasData)
									<li>{{ 'No activity' }}</li>
								@endif

							

								</ul>
							</div>
						</div>
						@endif
						   


					</div>
					@if (endCourse() === 1)
					<div class="col-md-5">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							<div class="weight-600 font-30 text-blue">Congratulation!</div>
						</h4>
						<a href='{{ route('download') }}' type="button" target="_blank" class="btn btn-warning">Download Your Certificate</a>
					</div>
					@else
					<div class="col-md-5">
						<img src="{{ asset('assets/images/user-dash.png') }}" alt="">
					</div>
					@endif
				</div>
				
			</div>
		   </div>
		   
				
				@if (endCourse() === 1)
					
				@else
				<div class="col-sm-4 mb-30">
					<div class="card-box pd-20 height-100-p mb-30">
					<div id='calendar'></div>
					<div class="calender d-flex">
 <div class="calender-points d-flex">

 <div class="colors-c d-flex">
 <span style="margin: 5px 2px 5px 2px;font-size: 9px;">Lessons</span>
 <span class="color-code" style="background-color: orange; border-radius: 50%; margin: 7px; width: 10px; height: 10px;"></span>
</div>

 <div class="colors-c d-flex">
 <span style="margin: 5px 2px 5px 2px;font-size: 9px;">MCQ exams</span>
 <span class="color-code" style="background-color: purple; border-radius: 50%; margin: 7px; width: 10px; height: 10px;"></span>
 </div>

 
 <div class="colors-c d-flex">
 <span style="margin: 5px 2px 5px 2px;font-size: 9px;">Paper exams</span>
 <span class="color-code" style="background-color: green; border-radius: 50%; margin: 7px; width: 10px; height: 10px;"></span>
 </div>
 

 <div class="colors-c d-flex">
 <span style="margin: 5px 2px 5px 2px;font-size: 9px;">Course works</span>
 <span class="color-code" style="background-color: blue; border-radius: 50%; margin: 7px; width: 10px; height: 10px;"></span>
 </div>

 <div class="colors-c d-flex">
 <span style="margin: 5px 2px 5px 2px;font-size: 10px;">Verbal exams</span>
 <span class="color-code" style="background-color: black; border-radius: 50%; margin: 8px; width: 12px; height: 12px;"></span></div>
 </div> 
 </div>
					</div>
		   		</div>
				@endif		
			
		  </div>
			<div class="row icon-boxes">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data my-5">
								<!-- <div id="chart"></div> -->
								<i class="icon-copy dw dw-open-book"></i>
							</div>
                            
							<div class="widget-data">
                                <a href="{{ route('userlesson') }}">
								<div class="h4 mb-0">Lessons</div>
								<div class="weight-600 font-14">New lessons <span class="badge badge-primary badge-pill bg-orange">{{ newlesson() }}</span></div>
                                </a>
							</div>
                            
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data my-5">
								<!-- <div id="chart2"></div> -->
								<i class="icon-copy dw dw-edit"></i>
							</div>
                            
							<div class="widget-data">
                                <a href="{{ route('usercoursework') }}">
								<div class="h4 mb-0">Course work</div>
								<div class="weight-600 font-14">New course work <span class="badge badge-primary badge-pill bg-blue">{{ newcoursework() }}</span></div>
                                </a>
							</div>
                             
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data my-5">
								<!-- <div id="chart3"></div> -->
								<i class="icon-copy dw dw-clipboard1"></i>
							</div>
                            
							<div class="widget-data">
                                <a href="{{ route('userexam') }}">
								<div class="h4 mb-0">Exams</div>
								<div class="weight-600 font-14">New exams <span class="badge badge-primary badge-pill bg-green">{{ newexam() }}</span></div>
                                </a>
							</div>
                             
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data my-5">
								<!-- <div id="chart4"></div> -->
								<i class="icon-copy dw dw-book"></i>
							</div>
                            
							<div class="widget-data">
                                <a href="{{ route('usertute') }}">
								<div class="h4 mb-0">Tutes</div>
								<div class="weight-600 font-14">New tutes <span class="badge badge-primary badge-pill bg-secondary">{{ newtute() }}</span></div>
                                 </a>
							</div>
                           
						</div>
					</div>
				</div>
			</div>
			@if (endCourse() === 0)
			<div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Payment</h2>
						<div class="row">
				
					<div class="col-md-7 pl-10">
						
						@if (paymentCheck() == 0)
						<form method="POST" action="{{ route('paycourse') }}" enctype="multipart/form-data">
							@csrf
						<div class="form-group">
							<label>Course</label>
							<input class="form-control" type="text" value="{{ $course->cname }}" readonly="">
							<input name="course_id" value="{{ $course->id}}" type="hidden">
						</div>
						
						
							

						<div class="form-group">
							<div class="row">
							  <div class="col-md-6 col-sm-12">
								<label class="weight-600">Choose payment type</label>
								<div class="custom-control custom-radio mb-5">
									<input type="radio" id="bank" value="bank" name="customRadio" class="custom-control-input">
									<label class="custom-control-label" for="bank">Bank Payment</label>
								</div>
								
								@if (couponCheck() == 1)
									<div class="custom-control custom-radio mb-5">
									<input type="radio" id="bank_coupen" value="bank_coupen" name="customRadio" class="custom-control-input">
									<label class="custom-control-label" for="bank_coupen">I have a Coupen Code</label>
								</div>	
								@endif
								
								{{-- <div class="custom-control custom-radio mb-5">
									<input type="radio" id="online" value="Online" name="customRadio" class="custom-control-input">
									<label class="custom-control-label" for="online">Online</label>
								</div> --}}
								
							</div>
							</div>
						</div>
						
						<input type="hidden" name="amount" value="{{ remindPayment() }}" id="">
						{{ 'Course Fee Rs:'.remindPayment() }}
						<div class="form-group" id="receiptField">
							<label>Upload recipt</label>
							<input type="file" name="slip" class="form-control-file form-control height-auto" >
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Click and Pay</button>
						</div>
					</form>
					@else

						<h3>No more payments</h3>

					@endif
					</div>
					<div class="col-md-5">
						<P id="bankField">සාමාන්‍ය පන්ති ගාස්තු ගෙවූ දරුවන් පමණක් බැංකු රිසිට් පත මෙතනින් upload කරන්න. පන්ති ගාස්තු සදහා සහන (Discounts/Offers) ලැබූ සිසුන් එම bank receipt පත 0123456789 අංකයට නම , LMS NAME එකෙහි register වූ දුරකතන අංකය , විෂය සහ ගුරුවරයා , ඒ ඒ විෂයට ගෙවූ ගාස්තුව වෙන වෙනම සදහන් කර WhatsApp කරන්න.සාමාන්‍ය පන්ති ගාස්තු ගෙවන දරුවන් සම්බන්ධ වන විෂයන් ඉදිරියේ හරි ලකුණු යොදා (click on the relevant tick box) මෙහි bank receipt පතෙහි photo එකක් හෝ screenshot එකක් upload කරන්න. (Pdf file upload කල නොහැක)</P>
					</div>
					
					</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20 text-center">
						<h2 class="h4 mb-20">Course Progress</h2>
						<div class="progress-user">
						<div class="circular-progress">
							<div class="value-container">0%</div>
						</div>
						</div>
						
					</div>
					
				</div>
			</div>
			@endif
			@if (Auth::user()->type === 'user')
				{{-- @include('components.hurray') --}}
			@else
				
			@endif
			
			

			
 @endsection  
 @section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    // Set the height to 100px
  });

  // Extract events from responseData and add them to FullCalendar
  var responseData = <?php echo json_encode($responseData); ?>;
  
  // Create arrays for different sections
  var lessonEvents = [];
  var mcqExamEvents = [];
  var paperExamEvents = [];
  var courseWorkEvents = [];
  var verbalExamEvents = [];

  // Loop through and add events from each section
  responseData['lessons'].forEach(function(lesson) {
    lessonEvents.push({
      start: lesson.lp,
      color: 'orange' // Customize the color for lessons
    });
  });

  responseData['mcq_exams'].forEach(function(mcqExam) {
    mcqExamEvents.push({
      start: mcqExam.mp,
      color: 'purple' // Customize the color for MCQ exams
    });
  });

  responseData['paper_exams'].forEach(function(paperExam) {
    mcqExamEvents.push({
      start: paperExam.pp,
      color: 'green' // Customize the color for MCQ exams
    });
  });

 responseData['course_works'].forEach(function(courseWork) {
    mcqExamEvents.push({
      start: courseWork.cp,
      color: 'blue' // Customize the color for MCQ exams
    });
  });

  responseData['verbal_exams'].forEach(function(verbalExam) {
    mcqExamEvents.push({
      start: verbalExam.vp,
      color: 'black' // Customize the color for MCQ exams
    });
  });
  // Add more sections as needed

  // Add section events to the FullCalendar events array
  calendar.addEventSource(lessonEvents);
  calendar.addEventSource(mcqExamEvents);
  // Add more sections as needed

  calendar.render();
});



let progressBar = document.querySelector(".circular-progress");
let valueContainer = document.querySelector(".value-container");

let progressValue = 0;
let progressEndValue =80;
let speed = 50;

let progress = setInterval(() => {
  progressValue++;
  valueContainer.textContent = `${progressValue}%`;
  progressBar.style.background = `conic-gradient(
      #4d5bf9 ${progressValue * 3.6}deg,
      #cadcff ${progressValue * 3.6}deg
  )`;
  if (progressValue == progressEndValue) {
    clearInterval(progress);
  }
}, speed);
</script>

<script>
$(document).ready(function() {
    // Initially hide the element with class "bank"
    $("#bankField").hide();
            // Also, hide the "Upload receipt" field
    $("#receiptField").hide();

    // Listen for changes in the radio buttons
    $('input[type=radio][name=customRadio]').change(function() {
        if (this.value === 'Online') {
            // If "Online" is selected, hide the element with class "bank"
            $("#bankField").hide();
            // Also, hide the "Upload receipt" field
            $("#receiptField").hide();
        } else {
            // If "Bank Payment full" is selected, show the element with class "bank"
            $("#bankField").show();
            // Show the "Upload receipt" field
            $("#receiptField").show();
        }
    });
});
</script>



 @endsection         