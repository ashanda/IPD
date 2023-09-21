<?php

namespace App\Http\Controllers;

use App\Models\McqExam;
use App\Models\Batch;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class McqExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->type === 'admin'){
        $data = McqExam::all();
        $batchData = Batch::where('status', 1)->get();

        }else if(Auth::user()->type === 'instructor'){
            $userBatchArray = json_decode(auth::user()->batch, true);

            $data = McqExam::where('status', 1)
                ->whereJsonContains('bid', $userBatchArray)
                ->get();
            

            // Filter Batch records based on matching batch IDs
            $batchData = Batch::where('status', 1)
                ->whereIn('id', $userBatchArray)
                ->get();
        }
          
        
        return view('pages.admin.exam.mcq-exam.index',compact('data','batchData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


     public function edit(Request $request, $id)
    {

        $findData = McqExam::where('id', $id)->first();

        if(Auth::user()->type === 'admin'){
        $data = McqExam::all();
        $batchData = Batch::where('status', 1)->get();

        }else if(Auth::user()->type === 'instructor'){
            $userBatchArray = json_decode(auth::user()->batch, true);

            $data = McqExam::where('status', 1)
                ->whereJsonContains('bid', $userBatchArray)
                ->get();
            

            // Filter Batch records based on matching batch IDs
            $batchData = Batch::where('status', 1)
                ->whereIn('id', $userBatchArray)
                ->get();
        }

        return view('pages.admin.exam.mcq-exam.edit', compact('data', 'findData','batchData'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string',
            'lms_exam_time_duration' => 'required|numeric',
            'lms_exam_question' => 'required|numeric',
            'publish_date' => 'required',
        ]);

        // Create a new MCQExam instance
        $mcqExam = new McqExam;
        $mcqExam->title = $validatedData['title'];
        $mcqExam->exam_time_duration = $validatedData['lms_exam_time_duration'];
        $mcqExam->exam_question = $validatedData['lms_exam_question'];
        $mcqExam->publish_date = Carbon::parse($validatedData['publish_date'])->format('Y-m-d');
        $batchIds = $request->input('bid', []);
        $mcqExam->bid = $batchIds;
        // Save the MCQExam instance
        $mcqExam->save();

        
        
        toast('MCQ exam Create successfully', 'success');
        return redirect()->route('mcq-exam.index');
    }
    public function show(Request $request, $id)
    {
        $exam = McqExam::find($id);
        $questions = Question::where('exam_id', $exam->id)->get();
        return view('pages.admin.exam.mcq-exam.show', compact('exam', 'questions'));
    }
    /**
     * Display the specified resource.
     */
    public function add_question(Request $request, $id)
    {
        $exam = McqExam::find($id);
        $question_count = Question::where('exam_id', $exam->id)->count();
        return view('pages.admin.exam.mcq-exam.add-question', compact('exam', 'question_count'));
    }

    public function add_question_db(Request $request)
    {
        $validatedData = $request->validate([
            'exam_id' => 'required',
            'question' => 'required',
            'ans_1' => 'required',
            'ans_2' => 'required',
            'ans_3' => 'required',
            'ans_4' => 'required',
            'ans' => 'required',
        ]);

        // Create a new Question object and set its properties
        $question = new Question();
        $question->exam_id = $validatedData['exam_id'];
        $question->descriptions = $validatedData['question'];
        $question->q1 = $validatedData['ans_1'];
        $question->q2 = $validatedData['ans_2'];
        $question->q3 = $validatedData['ans_3'];
        $question->q4 = $validatedData['ans_4'];
        $question->answer = $validatedData['ans'];
        $question->resourse = '';

        if ($request->file('document')) {
            $file = $request->file('document');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/mcq'), $filename);
            $question->resourse = $filename;
        }

        // Save the new question to the database
        $question->save();
       toast('Question added successfully', 'success');
        // Redirect back to the form or any other appropriate page
        return redirect()->back()->with('success', 'Question added successfully.');
    }

    public function update(Request $request, $id)
    {
        $exam = McqExam::findOrFail($id);
        // Update the exam object with the submitted form data
        $exam->title = $request->input('title');
        $exam->exam_time_duration = $request->input('lms_exam_time_duration');
        $exam->exam_question = $request->input('lms_exam_question');
        $exam->publish_date = Carbon::parse($request->input('publish_date'))->format('Y-m-d');
        $batchIds = $request->input('bid', []);
        $exam->bid = $batchIds;
        // Save the updated exam object
        $exam->save();
        // Redirect back to the exam view or any other appropriate page
        toast('MCQ exam updated successfully', 'success');
        return redirect()->back()->with('success', 'Exam updated successfully.');
    }


    public function mcq(Request $request, $id)
    {
        $exam = McqExam::find($id);
        $questions = Question::where('exam_id', $exam->id)->get();
        return view('pages.admin.exam.mcq-exam.index', compact('exam', 'questions'));
    }

    public function destroy(Request $request, $id)
    {
        // Retrieve the exam object from the database
        $exam = McqExam::findOrFail($id);

        // Delete the exam
        $exam->delete();
        toast('MCQ exam deleted successfully', 'success');
        // Redirect back to the exam view or any other appropriate page
        return redirect()->back()->with('success', 'Exam deleted successfully.');
    }
}
