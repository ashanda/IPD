@extends('layouts.app')

@section('content')
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
			@php
				$responseData = json_decode(upcomingins()->getContent(), true);
				$eventTypes = [
					'lt' => 'Lesson',
					'mt' => 'MCQ Test',
					'pt' => 'Paper Test',
					'ct' => 'Course Work',
					'vt' => 'Verbal Exam',
				];	
			@endphp
		<div class="pd-ltr-20">
			<div class="row">
			<div class="col-sm-8 mb-30">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-6">
						<img src="{{ asset('assets/images/instrctor-dash.png') }}" alt="">
					</div>
					<div class="col-md-6">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">{{ Auth::user()->fname .' '.Auth::user()->lname  }}!</div>
						</h4>
						<p class="font-18 max-width-600">I'm thrilled to be your instructor. Let's embark on an exciting learning adventure, where we explore new horizons, expand our minds, and achieve academic excellence together</p>
					</div>
					
				</div>
			</div>
			</div>
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
			</div>
			<div class="row">
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							
                            
							<div class="widget-data">
                                <a href="{{ route('lesson.index') }}">
								<div class="h4 mb-0">Programme Shedule</div>
								<div class="weight-600 font-14"> + Programme Shedule</div>
                                </a>
							</div>
                            
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							
                            
							<div class="widget-data">
                                <a href="{{ route('course-work.index') }}">
								<div class="h4 mb-0">Course Work</div>
								<div class="weight-600 font-14">+ Course Work</div>
                                </a>
							</div>
                             
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							
                            
							<div class="widget-data">
                                <a href="{{ route('tute.index') }}">
								<div class="h4 mb-0">Course Tute</div>
								<div class="weight-600 font-14">+ Course Tute</div>
                                </a>
							</div>
                             
						</div>
					</div>
				</div>
				
			</div>
			<div class="row">
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							
                            
							<div class="widget-data">
                                <a href="{{ route('getworksubmisson') }}">
								<div class="h4 mb-0">Course Work Submission</div>
								<div class="weight-600 font-14">Course Work Submission <span class="badge badge-primary badge-pill">{{ courseWorkSubmission() }}</span></div>
                                </a>
							</div>
                            
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							
                            
							<div class="widget-data">
                                <a href="{{ route('getpapersubmisson') }}">
								<div class="h4 mb-0">Paper Exam Submission</div>
								<div class="weight-600 font-14">Paper Exam Submission <span class="badge badge-primary badge-pill">{{ coursePaperSubmission() }}</span></div>
                                </a>
							</div>
                             
						</div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="widget-data">
                                <a href="{{ route('getverbalsubmisson') }}">
								<div class="h4 mb-0">Verbal Exam Submisson</div>
								<div class="weight-600 font-14">Verbal Exam Submisson <span class="badge badge-primary badge-pill">{{ courseVerbalSubmission() }}</span></div>
                                </a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
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
 </script>
 @endsection