<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

  

class LoginController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Login Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles authenticating users for the application and

    | redirecting them to your home screen. The controller uses a trait

    | to conveniently provide its functionality to your applications.

    |

    */

  

    use AuthenticatesUsers;

  

    /**

     * Where to redirect users after login.

     *

     * @var string

     */

    protected $redirectTo = RouteServiceProvider::HOME;

  

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest')->except('logout');

    }

    

    /**

     * Create a new controller instance.

     *

     * @return RedirectResponse

     */

    public function login(Request $request): RedirectResponse

    {   

        $input = $request->all();

     

        $this->validate($request, [

            'password' => 'required',

        ]);

     
       
        $loginField = null;

if (isset($input['email']) && filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
    $loginField = 'email';
} elseif (isset($input['contact_number'])) {
    $contactNumber = $input['contact_number'];
    
    // Check if the contact number starts with '0' and has at least two digits.
    if (strlen($contactNumber) >= 2 && $contactNumber[0] === '0') {
        $contactNumber = substr($contactNumber, 1); // Remove the first character '0'.
    }

    $loginField = 'contact_number';
}

if ($loginField) {
    $authenticationArray = [
        $loginField => $input[$loginField], // Use $loginField to access the correct input field
        'password' => $input['password'],
    ];

    if (auth()->attempt($authenticationArray)) {
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin.home');
        } elseif (auth()->user()->type == 'instructor') {
            return redirect()->route('instructor.home');
        } else {
            return redirect()->route('home');
        }
    } else {
        // Check which field caused the authentication failure and set an appropriate error message.
        $errorMessage = ($loginField === 'email') ? 'Invalid email or password.' : 'Invalid phone number or password.';
        return redirect()->route('login')->with('error', $errorMessage);
    }
} else {
    return redirect()->route('login')->with('error', 'Invalid login field.');
}


          

    }

}