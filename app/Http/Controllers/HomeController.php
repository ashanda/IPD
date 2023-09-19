<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\McqExam;
use App\Models\Payment;
use App\Models\Submission;
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
        $batch = json_decode(Auth::user()->batch, true);
        $currentDate = Carbon::now();

        $chats = User::join('chats', function ($join) use ($batch, $currentDate) {
			$join->on(function ($query) use ($batch) {
				foreach ($batch as $value) {
					$query->orWhereJsonContains('chats.bid', $value);
				}
			})
			->where('users.type', '=', 0);
		})
		->select(
			'chats.*'
		)
		->distinct()
        ->orderBy('chats.created_at', 'desc')
		->get();
        
        return view('pages.user.chat.index',compact('chats'));
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

        $batch = json_decode(Auth::user()->batch, true);
        $currentDate = Carbon::now();

        $upcomingDataPaperExams = User::join('paper_exams', function ($join) use ($batch, $currentDate) {
			$join->on(function ($query) use ($batch) {
				foreach ($batch as $value) {
					$query->orWhereJsonContains('paper_exams.bid', $value);
				}
			})
			->where('users.type', '=', 0)
			->where('paper_exams.publish_date', '>', $currentDate)
			->where('paper_exams.status', '=', 1);
		})
		->select(
			'paper_exams.*',
		)
		->distinct()
		->get();
        
        return view('pages.user.exam.paper.index',compact('upcomingDataPaperExams'));
    }

    public function verbalexam(){
        $batch = json_decode(Auth::user()->batch, true);
        $currentDate = Carbon::now();
        
        $upcomingDataVerbalExams = User::join('verbal_exams', function ($join) use ($batch, $currentDate) {
			$join->on(function ($query) use ($batch) {
				foreach ($batch as $value) {
					$query->orWhereJsonContains('verbal_exams.bid', $value);
				}
			})
			->where('users.type', '=', 0)
			->where('verbal_exams.publish_date', '>', $currentDate)
			->where('verbal_exams.status', '=', 1);
		})
		->select(
			'verbal_exams.*',
		)
		->distinct()
		->get();
        return view('pages.user.exam.verbal.index',compact('upcomingDataVerbalExams'));
    }

    public function result(){
        $results = Submission::where('index_number',Auth::user()->index_number)->get();
        return view('pages.user.result.index',compact('results'));
    }

    public function mypayment(){
         $results = Payment::where('index_number', Auth::user()->index_number)->orderBy('updated_at', 'desc')->get();
          return view('pages.user.payment.index',compact('results'));
    }

    public function profile(){
        return view('pages.user.profile.index');
    }

    public function groupchat(){
        return view('pages.user.chat.index');
    }
}
