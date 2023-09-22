<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RegisterController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   

    protected function validator(array $data)
    {
       
        return Validator::make($data, [
            'fname' => ['required'],
            'lname' => ['required'],
            'index_number' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_number' => ['required','max:10', 'unique:users'],
            'dob' => ['required'],
            'batch' => ['required'],
            'address' => ['required'],
            'coupen_code' => ['max:255']
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $formattedDob = Carbon::createFromFormat('d F Y', $data['dob'])->format('Y-m-d');
        
        return User::create([
            
            'fname' => $data['fname'],
            'index_number' => $data['index_number'],
            'lname' => $data['lname'],
            'contact_number' => $data['contact_number'],
            'dob' => $formattedDob,
            'batch' =>  json_encode([$data['batch']]),
            'address' => $data['address'],
            'email' => $data['email'],
            'coupen_code' => $data['coupen_code'],
            'password' => Hash::make($data['contact_number']),
        ]);
    }

     public function register(Request $request)
    {
        
        // Validate the incoming registration request data
        $this->validator($request->all())->validate();
        
        // Create a new user and fire the Registered event
        event(new Registered($user = $this->create($request->all())));

        // Log in the user
        Auth::login($user);

        // Redirect the user to the specified $redirectTo route (usually the home page)
        return redirect($this->redirectTo);
     
    }

    
    
}
