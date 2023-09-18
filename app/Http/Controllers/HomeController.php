<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\McqExam;
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

    public function exam(){
        return view('pages.user.exam.index');
    }

    public function mcqexam(){
        $batch = json_decode(Auth::user()->batch, true);
        $currentDate = Carbon::now();

        $upcomingDataMCQExams = User::join('mcq_exams', function ($join) use ($batch, $currentDate) {
            $join->on(function ($query) use ($batch) {
                foreach ($batch as $value) {
                    $query->orWhereJsonContains('mcq_exams.bid', $value);
                }
            })
            ->where('users.type', '=', 0)
            ->where('mcq_exams.publish_date', '>', $currentDate)
            ->where('mcq_exams.status', '=', 1);
        })
        ->join('questions', 'mcq_exams.id', '=', 'questions.exam_id') // Join questions table
        ->select(
            
            'questions.*',
            'mcq_exams.id as eid',
        )
        ->distinct()
        ->get();
        
        return view('pages.user.exam.mcq.index',compact('upcomingDataMCQExams'));
    }
    public function paperexam(){
        return view('pages.user.exam.paper.index');
    }
    public function verbalexam(){
        return view('pages.user.exam.verbal.index');
    }


}
