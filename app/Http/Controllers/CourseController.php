<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Batch;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Course::all();
        $batchData = Batch::where('status',1)->get();
        return view('pages.admin.course.index',compact('data','batchData'));
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
            $validatedData = $request->validate([
                'bid' => 'required|array', // Ensure "bid" is an array
                'cname' => 'required',
                'fee' => 'required',
            ]);

            // Create a new course with "bid" as an array
            $course = Course::create([
                'bid' => $validatedData['bid'],
                'cname' => $validatedData['cname'],
                'fee' => $validatedData['fee'],
            ]);

            // Check if course creation was successful
            if ($course) {
                toast('Course Created Successfully', 'success');
                return redirect()->route('course.index');
            } else {
                toast('Course Creation Failed', 'error');
                return redirect()->back();
            }
        }


    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Course::all();
        $batchData = Batch::where('status',1)->get();
        $findData = Course::where('id', $id)->first();
        return view('pages.admin.course.edit',compact('data', 'findData','batchData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
        {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'bid' => 'required', 
                'cname' => 'required',
                'fee' => 'required',
            ]);

            // Find the batch by ID
            $batch = Course::findOrFail($id);

            // Update the batch attributes
            $batch->update([
                'bid' => $validatedData['bid'],
                'cname' => $validatedData['cname'],
                'fee' => $validatedData['fee'],
            ]);
             toast('Course Update successfully', 'success');
            // Redirect back or to a different page after update
            return redirect()->route('course.index')->with('success', 'Batch updated successfully');
        }
        /**
         * Remove the specified resource from storage.
         */
        public function destroy($id)
        {
            $item = Course::findOrFail($id);
            $item->delete();

            // Redirect back or to a different page after deletion
            toast('Course Delete successfully', 'success');
            return redirect()->route('course.index');
        }
    }
