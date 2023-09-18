@extends('layouts.app')
@section('header')
<link href="{{ asset('assets/styles/jquery.quiz-min.css') }}" rel="stylesheet">
@endsection
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
					<div class="contact-directory-list">
						<div id="quiz">
    <div class="quiz-header" style="margin-bottom: 50px;">
      <h3>Get your question</h3>
     
    </div>
    <div class="quiz-start-screen">
      <p><a href="#" class="quiz-start-btn quiz-button">Start</a></p>
    </div>
    <!-- You can just specify your own quiz results container. -->
    <!-- Must match the default class or specify your own in the config (resultsScreen). -->
              <div class="quiz-results-screen">
                 <h3>Thank You!</h3>
                        <p class="quiz-results"></p>
                        <form id="results-form">
                            <p>
                            
                            <input type='hidden' value="{{ Auth::user()->index_number }}"  name="index_number">
                            <input type='hidden' value="{{ $upcomingDataMCQExams[0]->eid  }}"  name="exam_id">
                            <input type='hidden' value="{{ Auth::user()->batch  }}"  name="bid">
                           
                            </p>
                            <p><button type="submit">Submit</button></p>
                        </form>
                        </div>
                    </div>
					</div>
				</div>
			</div>

@endsection
@section('scripts')

<script src="{{  asset('assets/scripts/jquery.quiz-min.js')  }}"></script>

<script>
  $(document).ready(function() {
  $('#results-form').on('submit', function(e) {
    // Prevent the default form submission behavior
    e.preventDefault();

    // Get the text value from the element with class "quiz-results"
    var resultText = $(".quiz-results").text();
    var resultValues = resultText.split(',');

        // Assuming you have exactly two values separated by a comma,
        // you can access them as resultValues[0] and resultValues[1]
        var value1 = resultValues[0].trim(); // Remove any leading/trailing spaces
        var value2 = resultValues[1].trim();
    var formData = $(this).serialize();

    var formDataObj = {};
        formData.split('&').forEach(function(item) {
            var keyValue = item.split('=');
            formDataObj[keyValue[0]] = decodeURIComponent(keyValue[1]);
        });

        // Access the individual values by their keys
        var indexNumber = formDataObj['index_number'];
        var examId = formDataObj['exam_id'];
        var batchId = formDataObj['bid'];


    var combinedData = {
            score: value1,
            totalQuiz: value2,
            indexNumber: indexNumber,
            examId: examId,
            batchId: batchId
        };
    // Perform an AJAX request to send the resultText to the server
    $.ajax({
        type: 'POST', // You can change this to 'GET' or any other HTTP method
        url: '/your-server-endpoint', // Specify the URL where you want to send the data
        data: combinedData, // The data you want to send to the server
        success: function(response) {
            // Handle the server's response here, if needed
            console.log('AJAX request successful', response);
        },
        error: function(error) {
            // Handle any errors that occur during the AJAX request
            console.error('AJAX request error', error);
        }
    });

    // Remove the form element from the DOM
    $(this).remove();
});

    var questions = @json($upcomingDataMCQExams);
    console.log(questions);
    $('#quiz').quiz({

      finishButtonText: 'Finish',
      counterFormat: 'Question %current of %total',
      resultsFormat: '%score,%total ',
      questions: questions.map(function(question) {
        var qText = question.descriptions;
        if (question.resourse) {
          qText = '<img src="{{ asset("mcq") }}/' + question.resourse + '" class="w-100 mx-auto" style="max-width:650px" /><br />' + qText;
        }
        return {
          'q': qText,
          'options': [
            question.q1,
            question.q2,
            question.q3,
            question.q4
          ],
          'correctIndex': question.answer - 1,
          'correctResponse': 'Custom correct response.',
          'incorrectResponse': 'Custom incorrect response.'
        };
      })
    });
    
  });


</script>
@endsection
