<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Batch;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('type',2)->get();
       
        $batchData = Batch::where('status', 1)->get();
        return view('pages.admin.instructor.index',compact('data','batchData'));
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
    public function store(Request $request)
{
    // Validate the form data
   
    // Create a new Instructor instance
    $instructor = new User();

    // Set the Instructor's properties
    $instructor->fname = $request->input('fname');
    $instructor->lname = $request->input('lname');
    $instructor->email = $request->input('email');
    $instructor->type = 2;
    $instructor->index_number = $request->input('index_number');
    $instructor->contact_number = $request->input('cnumber');
    $instructor->password = Hash::make(($request->input('password')));
    $instructor->status = $request->input('status');

    // Handle the 'cover' file upload
    if ($request->hasFile('cover')) {
        $coverPath = $request->file('cover')->store('instructor', 'public');
        $instructor->cover = $coverPath;
    }

    $instructor->batch = json_encode($request->input('bid'));
    // Save the Instructor
        //try {
            // Attempt to save the instructor
            $instructor->save();

            // Display success toast and redirect to the instructor index page
            toast('Instructor created successfully', 'success');
            return redirect()->route('instructor.index')->with('success', 'Instructor added successfully.');
        // } catch (\Exception $e) {
        //     // An error occurred while saving the instructor
        //     // Display an error toast and redirect back with an error message
        //     toast('An error occurred while creating the instructor', 'error');
        //     return redirect()->back()->withErrors(['error' => 'An error occurred while creating the instructor.']);
        // }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::where('type',2)->get();
        $batchData = Batch::where('status',1)->get();
        $findData = User::where('id', $id)->first();
        return view('pages.admin.instructor.edit',compact('data', 'findData','batchData'));
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
            'email' => 'required|string|email|max:255|unique:users,email,' . $id, // Unique check but excluding the current instructor's email
            'cnumber' => 'required|integer',
            'password' => 'required|string|min:8',
            'status' => 'required|in:0,1',
            'bid' => 'array', // Assuming bid is an array of batch IDs
            'document' => 'file|mimes:pdf,doc,docx', // Modify the allowed file types as needed
        ]);

        // Find the instructor by ID
        $instructor = User::findOrFail($id);

        // Update the instructor's data
        $instructor->fname = $request->input('fname');
        $instructor->lname = $request->input('lname');
        $instructor->email = $request->input('email');
        $instructor->contact_number = $request->input('cnumber');
        $instructor->password = bcrypt($request->input('password'));
        $instructor->status = $request->input('status');

        // Handle the 'document' file upload
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('documents', 'public'); // Modify the storage path as needed
            $instructor->document = $documentPath;
        }

        // Save the instructor
        $instructor->save();

        // Sync the batches
        $batches = $request->input('bid', []);
        

        // Display a success toast and redirect to the instructor index page
        toast('Instructor updated successfully', 'success');
        return redirect()->route('instructor.index')->with('success', 'Instructor updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $item = User::findOrFail($id);
         $item->delete();

        // Redirect back or to a different page after deletion
        toast(' Instructor delete successfully', 'success');
        return redirect()->route('instructor.index');
    }
}
