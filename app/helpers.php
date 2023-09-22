<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Batch;
use App\Models\Payment;
use App\Models\Workshop;
use App\Models\Certificate;
use App\Models\CourseWork;
use App\Models\Lesson;
use App\Models\McqExam;
use App\Models\PaperExam;
use App\Models\Submission;
use App\Models\Tute;
use App\Models\VerbalExam;
use Illuminate\Support\Facades\DB;



//sms functionality
function smsBalance(){
	$curl = curl_init();

	curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://sms.send.lk/api/v3/balance',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'GET',
	CURLOPT_HTTPHEADER => array(
		'Authorization: Bearer 1383|Av9RSUmEhJAdpe1UVSE6iEaz0nMoCZWuP98RA31X '
	),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	$data = json_decode($response, true);

	// Check if the "remaining_unit" key exists in the data array
	if (isset($data['data']['remaining_unit'])) {
		$remainingUnit = $data['data']['remaining_unit'];
		echo "Remaining SMS Units: " . $remainingUnit;
	} else {
		echo "Remaining Units not found in the response.";
	}
	
}

function sendSMS($phone,$message)
{
    $MSISDN ="0" .$phone;
	$SRC = 'IPD EDU';
	$MESSAGE = ( urldecode($message));
	$AUTH = "1383|Av9RSUmEhJAdpe1UVSE6iEaz0nMoCZWuP98RA31X";  //Replace your Access Token
	
	$msgdata = array("recipient"=>$MSISDN, "sender_id"=>$SRC, "message"=>$MESSAGE);
	

			
			$curl = curl_init();
			
			//IF you are running in locally and if you don't have https/SSL. then uncomment bellow two lines
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://sms.send.lk/api/v3/sms/send",
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_POSTFIELDS => json_encode($msgdata),
			  CURLOPT_HTTPHEADER => array(
				"accept: application/json",
				"authorization: Bearer $AUTH",
				"cache-control: no-cache",
				"content-type: application/x-www-form-urlencoded",
			  ),
			));

			$response = curl_exec($curl);
			
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			 // echo $response;
			}
}


////////////////////////////////

function getAllactiveBatch(){
    $batches = Batch::where('status', 1)->get();
    return $batches;
}

function getBatch($id){
    $batches = Batch::where('id', $id)->first();
    return $batches;
}

function certificate($id){
    $certificate = 0;
    return $certificate;
}

function getWorkshop(){
	$data = Workshop::where('status', 1)->first();
	return $data;
}

function paymentCheck(){
$indexNumber = Auth::user()->index_number;
$status = 1; // Change this to the desired status value

$totalAmount = Payment::sumAmountForStatusAndIndexNumber($indexNumber, $status);

$payments = Payment::join('courses', 'payments.batch_id', '=', 'courses.bid')
	->where('status', 1)
	->where('index_number', Auth::user()->index_number)
    ->whereJsonContains('courses.bid', json_decode(Auth::user()->batch, true))
    ->first();


if($payments == null){
	$fee = 0;
}else{
     $fee = $payments->fee;
}


if($totalAmount >= $fee){
	$pay = 1;
	
}else{
	$pay = 0;
}

return $pay;
}


function expireCheck(){
	$expireCheck = Payment::where('status', 1)
    ->where('index_number', Auth::user()->index_number)
    ->latest()
    ->first();


	if ($expireCheck && Carbon::now() <= Carbon::parse($expireCheck->expired_date)) {
        // The payment is not expired
		$expireCheckdata = 1;
    } else {
        // The payment is expired or $expireCheck is null
		$expireCheckdata = 0;
    }

	return $expireCheckdata;
}

function endCourse(){
	$checkend = Certificate::where('status', 1)->where('index_number', Auth::user()->index_number)->first();
	if( $checkend != null){
		$endCourse = 1;
	}else{
		$endCourse = 0;
	}

	return $endCourse;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    return $randomString;
}


function notice() {


	$batch = json_decode(Auth::user()->batch, true);
	$currentDate = Carbon::now();

	$usersWithBatchesAndBids = User::join('notices', function ($join) use ($batch, $currentDate) {
		$join->on(function ($query) use ($batch) {
			foreach ($batch as $value) {
				$query->orWhereJsonContains('notices.bid', $value);
			}
		})
		->where('users.type', '=', 0);
	})
	->select('notices.*')
	->distinct()
	->orderBy('notices.created_at', 'desc') // Add this line to order by created_at in descending order
	->get();

    return $usersWithBatchesAndBids;
}


function debug(){

	$batch = json_decode(Auth::user()->batch, true);
	$currentDate = Carbon::now();

	$upcomingDataLessons = User::join('lessons', function ($join) use ($batch, $currentDate) {
    $join->on(function ($query) use ($batch) {
        foreach ($batch as $value) {
            $query->orWhereJsonContains('lessons.bid', $value);
        }
    })
    ->where('users.type', '=', 0)
    ->where('lessons.publish_date', '>=', $currentDate)
    ->where('lessons.status', '=', 1);
})
->select(
    'lessons.lesson_name as lt',
    'lessons.publish_date as lp'
)
->distinct()
->get();

return $upcomingDataLessons;
}


function upcoming() {
	
$batch = json_decode(Auth::user()->batch, true);
$currentDate = Carbon::now()->format('Y-m-d');

	$upcomingDataLessons = User::join('lessons', function ($join) use ($batch, $currentDate) {
    $join->on(function ($query) use ($batch) {
        foreach ($batch as $value) {
            $query->orWhereJsonContains('lessons.bid', $value);
        }
			})
			->where('users.type', '=', 0)
			->where('lessons.publish_date', '>=', $currentDate)
			->where('lessons.status', '=', 1);
		})
		->select(
			'lessons.lesson_name as lt',
			'lessons.publish_date as lp'
		)
		->distinct()
		->get();



		$upcomingDataMCQExams = User::join('mcq_exams', function ($join) use ($batch, $currentDate) {
			$join->on(function ($query) use ($batch) {
				foreach ($batch as $value) {
					$query->orWhereJsonContains('mcq_exams.bid', $value);
				}
			})
			->where('users.type', '=', 0)
			->where('mcq_exams.publish_date', '>=', $currentDate)
			->where('mcq_exams.status', '=', 1);
		})
		->select(
			'mcq_exams.title as mt',
			'mcq_exams.publish_date as mp'
		)
		->distinct()
		->get();

		$upcomingDataPaperExams = User::join('paper_exams', function ($join) use ($batch, $currentDate) {
			$join->on(function ($query) use ($batch) {
				foreach ($batch as $value) {
					$query->orWhereJsonContains('paper_exams.bid', $value);
				}
			})
			->where('users.type', '=', 0)
			->where('paper_exams.publish_date', '>=', $currentDate)
			->where('paper_exams.status', '=', 1);
		})
		->select(
			'paper_exams.title as pt',
			'paper_exams.publish_date as pp'
		)
		->distinct()
		->get();

		$upcomingDataCourseWorks = User::join('course_works', function ($join) use ($batch, $currentDate) {
			$join->on(function ($query) use ($batch) {
				foreach ($batch as $value) {
					$query->orWhereJsonContains('course_works.bid', $value);
				}
			})
			->where('users.type', '=', 0)
			->where('course_works.publish_date', '>=', $currentDate)
			->where('course_works.status', '=', 1);
		})
		->select(
			'course_works.title as ct',
			'course_works.publish_date as cp'
		)
		->distinct()
		->get();

		$upcomingDataVerbalExams = User::join('verbal_exams', function ($join) use ($batch, $currentDate) {
			$join->on(function ($query) use ($batch) {
				foreach ($batch as $value) {
					$query->orWhereJsonContains('verbal_exams.bid', $value);
				}
			})
			->where('users.type', '=', 0)
			->where('verbal_exams.publish_date', '>=', $currentDate)
			->where('verbal_exams.status', '=', 1);
		})
		->select(
			'verbal_exams.title as vt',
			'verbal_exams.publish_date as vpb'
		)
		->distinct()
		->get();

		// Combine the results into one JSON response
		$combinedData = [
			'lessons' => $upcomingDataLessons,
			'mcq_exams' => $upcomingDataMCQExams,
			'paper_exams' => $upcomingDataPaperExams,
			'course_works' => $upcomingDataCourseWorks,
			'verbal_exams' => $upcomingDataVerbalExams,
		];

	return response()->json($combinedData);

}


function upcomingins() {
	
$batch = json_decode(Auth::user()->batch, true);
$currentDate = Carbon::now()->format('Y-m-d');

	$upcomingDataLessons = User::join('lessons', function ($join) use ($batch, $currentDate) {
    $join->on(function ($query) use ($batch) {
        foreach ($batch as $value) {
            $query->orWhereJsonContains('lessons.bid', $value);
        }
			})
			->where('users.type', '=', 2)
			->where('lessons.publish_date', '>=', $currentDate)
			->where('lessons.status', '=', 1);
		})
		->select(
			'lessons.lesson_name as lt',
			'lessons.publish_date as lp'
		)
		->distinct()
		->get();



		$upcomingDataMCQExams = User::join('mcq_exams', function ($join) use ($batch, $currentDate) {
			$join->on(function ($query) use ($batch) {
				foreach ($batch as $value) {
					$query->orWhereJsonContains('mcq_exams.bid', $value);
				}
			})
			->where('users.type', '=', 2)
			->where('mcq_exams.publish_date', '>=', $currentDate)
			->where('mcq_exams.status', '=', 1);
		})
		->select(
			'mcq_exams.title as mt',
			'mcq_exams.publish_date as mp'
		)
		->distinct()
		->get();

		$upcomingDataPaperExams = User::join('paper_exams', function ($join) use ($batch, $currentDate) {
			$join->on(function ($query) use ($batch) {
				foreach ($batch as $value) {
					$query->orWhereJsonContains('paper_exams.bid', $value);
				}
			})
			->where('users.type', '=', 2)
			->where('paper_exams.publish_date', '>=', $currentDate)
			->where('paper_exams.status', '=', 1);
		})
		->select(
			'paper_exams.title as pt',
			'paper_exams.publish_date as pp'
		)
		->distinct()
		->get();

		$upcomingDataCourseWorks = User::join('course_works', function ($join) use ($batch, $currentDate) {
			$join->on(function ($query) use ($batch) {
				foreach ($batch as $value) {
					$query->orWhereJsonContains('course_works.bid', $value);
				}
			})
			->where('users.type', '=', 2)
			->where('course_works.publish_date', '>=', $currentDate)
			->where('course_works.status', '=', 1);
		})
		->select(
			'course_works.title as ct',
			'course_works.publish_date as cp'
		)
		->distinct()
		->get();

		$upcomingDataVerbalExams = User::join('verbal_exams', function ($join) use ($batch, $currentDate) {
			$join->on(function ($query) use ($batch) {
				foreach ($batch as $value) {
					$query->orWhereJsonContains('verbal_exams.bid', $value);
				}
			})
			->where('users.type', '=', 2)
			->where('verbal_exams.publish_date', '>=', $currentDate)
			->where('verbal_exams.status', '=', 1);
		})
		->select(
			'verbal_exams.title as vt',
			'verbal_exams.publish_date as vpb'
		)
		->distinct()
		->get();

		// Combine the results into one JSON response
		$combinedData = [
			'lessons' => $upcomingDataLessons,
			'mcq_exams' => $upcomingDataMCQExams,
			'paper_exams' => $upcomingDataPaperExams,
			'course_works' => $upcomingDataCourseWorks,
			'verbal_exams' => $upcomingDataVerbalExams,
		];

	return response()->json($combinedData);

}


//Upcomming all
function upcomingall() {
	
$currentDate = Carbon::now();

$upcomingDataLessons = Lesson::where('publish_date', '>=', $currentDate)
    ->where('status', '=', 1)
    ->select(
        'lesson_name as lt',
        'publish_date as lp'
    )
    ->distinct()
    ->get();

$upcomingDataMCQExams = McqExam::where('publish_date', '>=', $currentDate)
    ->where('status', '=', 1)
    ->select(
        'title as mt',
        'publish_date as mp'
    )
    ->distinct()
    ->get();

$upcomingDataPaperExams = PaperExam::where('publish_date', '>=', $currentDate)
    ->where('status', '=', 1)
    ->select(
        'title as pt',
        'publish_date as pp'
    )
    ->distinct()
    ->get();

$upcomingDataCourseWorks = CourseWork::where('publish_date', '>=', $currentDate)
    ->where('status', '=', 1)
    ->select(
        'title as ct',
        'publish_date as cp'
    )
    ->distinct()
    ->get();

$upcomingDataVerbalExams = VerbalExam::where('publish_date', '>=', $currentDate)
    ->where('status', '=', 1)
    ->select(
        'title as vt',
        'publish_date as vpb'
    )
    ->distinct()
    ->get();

// Combine the results into one JSON response
$combinedData = [
    'lessons' => $upcomingDataLessons,
    'mcq_exams' => $upcomingDataMCQExams,
    'paper_exams' => $upcomingDataPaperExams,
    'course_works' => $upcomingDataCourseWorks,
    'verbal_exams' => $upcomingDataVerbalExams,
];

return response()->json($combinedData);

}



function examcheck($id,$type){
	$data = Submission::where('exam_id', '=', $id)->where('type',$type)->where('index_number',Auth::user()->index_number)->count();
	return $data;
}


function user_data($id){
 $data = User::where('index_number',$id)->first();
 return $data;
}


function paycount(){
	$data = Payment::where('index_number',Auth::user()->index_number)->where('status',1)->count();
	return $data;
}


function lastPay(){
	$data = Payment::where('index_number', Auth::user()->index_number)->latest()->first();
	if($data === null){
		$lastPay = 0;
	}else{
	if($data->status === 2){
		$lastPay = 2; 
	}else if($data->status === 1){
		$lastPay = 1;
	}else if($data->status === 3){
		$lastPay = 3;
	}else{
		$lastPay = 0;
	}	

	}
	

	return $lastPay;
}



function courseWorkSubmission(){
    $userBatchArray = json_decode(auth::user()->batch, true);
	$data = Submission::WhereJsonContains('bid',$userBatchArray)->where('type','Course Work')->where('marks',NULL)->count();

	return $data;	
}

function coursePaperSubmission(){

	$userBatchArray = json_decode(auth::user()->batch, true);
	$data = Submission::WhereJsonContains('bid',$userBatchArray)->where('type','Paper Test')->where('marks',NULL)->count();

	return $data;


}

function courseVerbalSubmission(){

	$userBatchArray = json_decode(auth::user()->batch, true);
	$data = Submission::WhereJsonContains('bid',$userBatchArray)->where('type','Verbal Test')->where('marks', NULL)->count();
	
	return $data;

}

Function newPayment(){
	$data = Payment::where('status',2)->count();
	return $data;
}

Function certificateStatus($id){
	$data = Certificate::where('index_number',$id)->first();
	
	return $data;
}


Function newlesson(){
	$current_date = Carbon::now()->format('Y-m-d');
	$userBatchArray = json_decode(auth::user()->batch, true);
    $data = Lesson::whereJsonContains('bid', $userBatchArray)
        ->where('status', 1)
        ->where('publish_date', '>=', $current_date)
        ->count();

    return $data;
}

Function newcoursework(){
	$current_date = Carbon::now()->format('Y-m-d');
$userBatchArray = json_decode(auth::user()->batch, true);
    $data = CourseWork::whereJsonContains('bid', $userBatchArray)
        ->where('status', 1)
        ->where('publish_date', '>=', $current_date)
        ->count();

    return $data;
}

Function newtute(){
	$current_date = Carbon::now()->format('Y-m-d');
$userBatchArray = json_decode(auth::user()->batch, true);
    $data = Tute::whereJsonContains('bid', $userBatchArray)
        ->where('status', 1)
        ->where('created_at', '>=', $current_date)
        ->count();

    return $data;
}

Function newexam(){
	$current_date = Carbon::now()->format('Y-m-d');
$userBatchArray = json_decode(auth::user()->batch, true);
    $data1 = McqExam::whereJsonContains('bid', $userBatchArray)
        ->where('status', 1)
        ->where('publish_date', '>=', $current_date)
        ->count();

    $data2 = PaperExam::whereJsonContains('bid', $userBatchArray)
        ->where('status', 1)
        ->where('publish_date', '>=', $current_date)
        ->count();

    $data3 = VerbalExam::whereJsonContains('bid', $userBatchArray)
        ->where('status', 1)
        ->where('publish_date', '>=', $current_date)
        ->count();

	$data = $data1+$data2+$data3;	
    
	return $data;
}

function currentHome(){
	if (Auth::user()->type === 'admin'){
			$homeurl = '/admin/home';
		}elseif (Auth::user()->type === 'user'){
			$homeurl = '/home';
		}else{
			$homeurl = '/instructor/home';	
	}

	return $homeurl;
}