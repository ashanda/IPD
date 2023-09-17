<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Batch;
use App\Models\Payment;
use App\Models\Workshop;
use App\Models\Certificate;
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
    $MSISDN = $phone;
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
    ->whereJsonContains('payments.batch_id', json_decode(Auth::user()->batch, true))
    ->first();

if($totalAmount >= $payments->fee){
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

