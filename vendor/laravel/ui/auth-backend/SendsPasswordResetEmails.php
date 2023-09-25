<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

trait SendsPasswordResetEmails
{
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
   public function sendResetLinkEmail(Request $request)
{
    // Validate the request as needed.
    $this->validateEmail($request);

    // Find the user based on their contact number.
    $user = User::where('contact_number', $request->contact_number)->first();

    if ($user) {
        // Assuming you have a 'contact_number' attribute on your User model.
        $phone = $user->contact_number;

        // Generate the password reset token and link.
        $token = \Illuminate\Support\Str::random(64);
        $resetLink = url('password/reset', $token);

        // Construct the SMS message with the reset link.
        $message = "Your password reset link: $resetLink";

        // Use your sendSMS function to send the SMS.
        $this->sendSMS($phone, $message);

        // You can return a response (customize this part as needed).
        
        toast('Password reset link sent via SMS', 'success');
        // Redirect back with a success message or perform other actions as needed
        return redirect()->route('login')->with('success', 'Password reset link sent via SMS');
        //return response()->json(['message' => 'Password reset link sent via SMS']);
    } else {
        // Handle the case where the user with the given contact number is not found.
        toast('User not found', 'error');
        return redirect()->route('password.request')->with('success', 'User not found');
       // return response()->json(['message' => 'User not found'], 404);
    }
}





    private function sendSMS($phone, $message)
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
    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $request->validate(['contact_number' => 'required|max:10']);
    }

    /**
     * Get the needed authentication credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only('contact_number');
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        return $request->wantsJson()
                    ? new JsonResponse(['message' => trans($response)], 200)
                    : back()->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'email' => [trans($response)],
            ]);
        }

        return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => trans($response)]);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }
}
