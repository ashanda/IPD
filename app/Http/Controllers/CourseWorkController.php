<?php

namespace App\Http\Controllers;

use App\Models\CourseWork;
use App\Models\Lesson;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class CourseWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CourseWork::all();
        $batchData = Batch::where('status', 1)->get();
        return view('pages.admin.course-work.index',compact('data','batchData'));
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
        $coursework = new CourseWork();
        $coursework->title = $request->input('title');
        $coursework->cname = ''; // You need to define where 'cname' comes from
        $coursework->description = $request->input('description');
        $coursework->publish_date = Carbon::parse($request->input('publish_date'))->format('Y-m-d');
        $coursework->start_time = date('H:i:s', strtotime($request->input('start_time')));
        $coursework->end_time = date('H:i:s', strtotime($request->input('end_time')));
        $coursework->status = $request->input('status');
        $coursework->document = ''; // You need to handle the cover image separately


        // Handle the 'cover' file upload
        if ($request->hasFile('document')) {
            $coverPath = $request->file('document')->store('course_work', 'public');
            $coursework->document = $coverPath;
        }

        // Convert selected batch IDs to a JSON array
        $batchIds = $request->input('bid', []);
        $coursework->bid = json_encode($batchIds);

        $coursework->save();
        
        toast('Course Work Create successfully', 'success');
        return redirect()->route('course-work.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseWork $courseWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = CourseWork::all();
        $batchData = Batch::where('status',1)->get();
        $findData = CourseWork::where('id', $id)->first();
        return view('pages.admin.course-work.edit',compact('data', 'findData','batchData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
           $coursework = CourseWork::findOrFail($id);

            // Update the coursework data
            $coursework->title = $request->input('title');
            $coursework->status = $request->input('status');
            $coursework->publish_date = Carbon::parse($request->input('publish_date'))->format('Y-m-d');
            $coursework->description = $request->input('description');
            $coursework->start_time = date('H:i:s', strtotime($request->input('start_time')));
            $coursework->end_time = date('H:i:s', strtotime($request->input('end_time')));

            // Handle the 'cover' file upload
            if ($request->hasFile('document')) {
                $coverPath = $request->file('document')->store('course_work', 'public');
                $coursework->document = $coverPath;
            }

            // Save the updated coursework
            $coursework->save();

            // Update the associations with batches
            $batchIds = $request->input('bid', []);
            
            toast('Course Work Update successfully', 'success');
            return redirect()->route('course-work.index')->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        $item = CourseWork::findOrFail($id);
        $item->delete();

    // Redirect back or to a different page after deletion
    toast('Course Work Delete successfully', 'success');
    return redirect()->route('course-work.index');
    }
}
