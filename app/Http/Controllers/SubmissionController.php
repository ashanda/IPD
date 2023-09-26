<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.instructor.submission.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getworksubmisson(){
        $userBatchArray = json_decode(auth::user()->batch, true);
        $data = Submission::whereJsonContains('bid',$userBatchArray)->where('type','Course Work')->get();
        return view('pages.instructor.submission.index',compact('data'));
    }

    public function getpapersubmisson(){
       $userBatchArray = json_decode(auth::user()->batch, true);
        $data = Submission::whereJsonContains('bid',$userBatchArray)->where('type','Paper Test')->get();
        return view('pages.instructor.submission.index',compact('data'));
    }

    public function getverbalsubmisson(){
       $userBatchArray = json_decode(auth::user()->batch, true);
        $data = Submission::whereJsonContains('bid',$userBatchArray)->where('type','Verbal Test')->get();
        return view('pages.instructor.submission.index',compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function submisson(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'index_number' => 'required|string',
            'exam_id' => 'required|integer',
            'type' => 'required',
            'bid' => 'required',
        ]);

        // Create a new instance of your model and populate it with the request data
        $newRecord = new Submission(); // Replace 'YourModel' with the actual model name

        $newRecord->index_number = $validatedData['index_number'];
        $newRecord->marks = $request->input('marks');
        $newRecord->total_question = $request->input('total_question');
        $newRecord->exam_id = $validatedData['exam_id'];
        $newRecord->type = $validatedData['type'];
    
        if($validatedData['type'] === 'MCQ Test'){

            $newRecord->bid = $validatedData['bid'];

        }else{
            
            $newRecord->bid = $validatedData['bid'];
        }

        

        // Convert JSON to PHP array

        if ($request->hasFile('document')) {
                    $coverPath = $request->file('document')->store('submission', 'public');
                    $newRecord->document = $coverPath;
        }

                // Save the updated coursework

        // Save the new record to the database
        $newRecord->save();
        if($validatedData['type'] === 'MCQ Test'){
        // You can return a response here if needed
        return response()->json(['message' => 'Record stored successfully'], 200);
        } else{
            toast('Course work submitted successfully.', 'success');
            return redirect()->back()->with('success', 'Course work submitted successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateMarks(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'marks' => 'required|numeric',
        ]);

        // Find the record to update by its ID
        $record = Submission::find($id);

        if (!$record) {
            // Handle the case where the record does not exist
            toast('Marks updated successfully.', 'error');
            return redirect()->back()->with('error', 'Record not found.');
        }

        // Update the marks field
        $record->marks = $validatedData['marks'];
        $record->save();

        // Redirect back with a success message
        toast('Marks updated successfully.', 'success');
        return redirect()->back()->with('success', 'Marks updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
