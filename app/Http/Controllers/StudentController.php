<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $data = User::where('type', 0)->get();
    //     $batchData = Batch::where('status', 1)->get();
    //     return view('pages.admin.student.index', compact('data', 'batchData'));
    // }

    public function index()
{
    $data = User::where('type', 0)->get();
    $batchData = Batch::where('status', 1)->get()->keyBy('id');

    foreach ($data as $student) {
        $batchIds = json_decode($student->batch, true); // Decode the JSON string

        // Check if $batchIds is an array
        if (is_array($batchIds)) {
            $batchNames = [];

            foreach ($batchIds as $batchId) {
                $batch = $batchData[$batchId];
                $batchNames[] = $batch ? $batch->bname : 'Batch not found';
            }

            $student->batch_names = implode(', ', $batchNames);
        } else {
            // Handle the case where $student->batch is not a valid JSON array
            $student->batch_names = 'Batch not found';
        }
    }

    return view('pages.admin.student.index', compact('data'));
}

    

    

    /**
     * Display a listing of the resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::where('type', 0)->get();
        $batchData = Batch::where('status', 1)->get();
        $findData = User::where('id', $id)->first();
        return view('pages.admin.student.edit', compact('data', 'findData', 'batchData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'cnumber' => 'required|integer',
            'password' => 'required|string|min:8',
            'status' => 'required|in:0,1',
            'bid' => 'array',
            'document' => 'file|mimes:pdf,doc,docx',
        ]);

        // Find the student by ID
        $student = User::findOrFail($id);

        // Update the student's data
        $student->fname = $request->input('fname');
        $student->lname = $request->input('lname');
        $student->email = $request->input('email');
        $student->contact_number = $request->input('cnumber');
        $student->password = bcrypt($request->input('password'));
        $student->status = $request->input('status');

        // Handle the 'document' file upload
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('documents', 'public'); // Modify the storage path as needed
            $student->document = $documentPath;
        }

        // Save the student
        $student->save();

        // Sync the batches
        $batches = $request->input('bid', []);


        // Display a success toast and redirect to the student index page
        toast('Student updated successfully', 'success');
        return redirect()->back()->with('success', 'Student updated successfully.');
    }

    public function batchwise()
    {
        $data = User::where('type', 0)->get();
        $batchData = Batch::where('status', 1)->get();
        return view('pages.admin.student.batchwise', compact('data', 'batchData'));

    }   


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        // Redirect back or to a different page after deletion
        toast(' Student delete successfully', 'success');
        return redirect()->route('student.index');
    }
}
