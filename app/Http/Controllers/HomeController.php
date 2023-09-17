<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
   /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index(): View

    {
        $course = Course::first();

        return view('pages.user.home',compact('course'));

    } 

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function adminHome(): View

    {
        
        return view('pages.admin.adminHome');

    }

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function instructorHome(): View

    {

        return view('pages.instructor.instructorHome');

    }

    public function profile(){
        return view('pages.user.profile.index');
    }

    public function groupchat(){
        return view('pages.user.chat.index');
    }
}
