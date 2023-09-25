<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

trait ResetsPasswords
{
    use RedirectsUsers;

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request)
{
    $token = $request->route()->parameter('token');

    return view('auth.passwords.reset')->with(
        ['token' => $token, 'contact_number' => $request->contact_number]
    );
}

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
        {
            $request->validate($this->rules(), $this->validationErrorMessages());

            // Find the user based on their contact number.
            $user = User::where('contact_number', $request->contact_number)->first();

            if (!$user) {
                toast('Contact number not matching our records', 'error');
                // Redirect back with a success message or perform other actions as needed
                return redirect()->back();
                // Handle the case where the user with the given contact number is not found.
               // return response()->json(['message' => 'User not found'], 404);
            }

            // Generate a new password and set it for the user.
            $newPassword = $request->password; // Generate a random password.
            $user->password = Hash::make($newPassword);
            $user->save();

            // Send the new password via SMS.
            $message = "Your new password is: $newPassword";
            $this->sendSMS($request->contact_number, $message);

            // Return a response indicating success.
             toast('Password reset successful. New password sent via SMS', 'success');
                // Redirect back with a success message or perform other actions as needed
             return redirect()->route('login')->with('success', 'Password reset successful. New password sent via SMS');
            //return response()->json(['message' => 'Password reset successful. New password sent via SMS']);
        }


        private function sendSMS($phone, $message)
        {
             $MSISDN =$phone;
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
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'contact_number' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [];
    }

    /**
     * Get the password reset credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only(
            'contact_number', 'password', 'password_confirmation', 'token'
        );
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $this->setUserPassword($user, $password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }

    /**
     * Set the user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function setUserPassword($user, $password)
    {
        $user->password = Hash::make($password);
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            return new JsonResponse(['message' => trans($response)], 200);
        }

        return redirect($this->redirectPath())
                            ->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'email' => [trans($response)],
            ]);
        }

        return redirect()->back()
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

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
