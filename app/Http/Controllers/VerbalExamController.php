<?php

namespace App\Http\Controllers;

use App\Models\VerbalExam;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VerbalExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = VerbalExam::all();
        $batchData = Batch::where('status', 1)->get();
        return view('pages.admin.exam.verbal-exam.index',compact('data','batchData'));
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
        $coursework = new VerbalExam();
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
            $coverPath = $request->file('document')->store('verbal-exam', 'public');
            $coursework->document = $coverPath;
        }

        // Convert selected batch IDs to a JSON array
        $batchIds = $request->input('bid', []);
        $coursework->bid = json_encode($batchIds);

        $coursework->save();
        
        toast('Verbal Exam Create successfully', 'success');
        return redirect()->route('exam.verbal-exam.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(VerbalExam $courseWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = VerbalExam::all();
        $batchData = Batch::where('status',1)->get();
        $findData = VerbalExam::where('id', $id)->first();
        return view('pages.admin.exam.verbal-exam.edit',compact('data', 'findData','batchData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
           $coursework = VerbalExam::findOrFail($id);

            // Update the coursework data
            $coursework->title = $request->input('title');
            $coursework->status = $request->input('status');
            $coursework->publish_date = Carbon::parse($request->input('publish_date'))->format('Y-m-d');
            $coursework->description = $request->input('description');
            $coursework->start_time = date('H:i:s', strtotime($request->input('start_time')));
            $coursework->end_time = date('H:i:s', strtotime($request->input('end_time')));
            $batchIds = $request->input('bid', []);
            $coursework->bid = json_encode($batchIds);
            // Handle the 'cover' file upload
            if ($request->hasFile('document')) {
                $coverPath = $request->file('document')->store('verbal-exam', 'public');
                $coursework->document = $coverPath;
            }

            // Save the updated coursework
            $coursework->save();

            // Update the associations with batches
            
            toast('Verbal Exam Update successfully', 'success');
            return redirect()->route('exam.verbal-exam.index')->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        $item = VerbalExam::findOrFail($id);
        $item->delete();

    // Redirect back or to a different page after deletion
    toast('Verbal Exam Delete successfully', 'success');
    return redirect()->route('exam.verbal-exam.index');
    }
}
