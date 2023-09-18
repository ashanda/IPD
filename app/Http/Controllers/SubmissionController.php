<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function submisson(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'index_number' => 'required|string',
        'marks' => 'required|integer',
        'total_question' => 'required|integer',
        'exam_id' => 'required|integer',
        'bid' => 'required',
        'type' => 'required',
    ]);

    // Create a new instance of your model and populate it with the request data
    $newRecord = new Submission(); // Replace 'YourModel' with the actual model name

    $newRecord->index_number = $validatedData['index_number'];
    $newRecord->marks = $validatedData['marks'];
    $newRecord->total_question = $validatedData['total_question'];
    $newRecord->exam_id = $validatedData['exam_id'];
    $newRecord->bid = $validatedData['bid']; // Convert JSON to PHP array
    $newRecord->type = $validatedData['type']; // Convert JSON to PHP array

    // Save the new record to the database
    $newRecord->save();

    // You can return a response here if needed
    return response()->json(['message' => 'Record stored successfully'], 200);
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
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
