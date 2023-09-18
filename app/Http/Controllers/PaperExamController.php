<?php

namespace App\Http\Controllers;

use App\Models\PaperExam;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PaperExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PaperExam::all();
        $batchData = Batch::where('status', 1)->get();
        return view('pages.admin.exam.paper-exam.index',compact('data','batchData'));
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
        $coursework = new PaperExam();
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
            $coverPath = $request->file('document')->store('paper-exam', 'public');
            $coursework->document = $coverPath;
        }

        // Convert selected batch IDs to a JSON array
        $batchIds = $request->input('bid', []);
        $coursework->bid = json_encode($batchIds);

        $coursework->save();
        
        toast('Paper Exam Create successfully', 'success');
        return redirect()->route('paper-exam.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaperExam $courseWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = PaperExam::all();
        $batchData = Batch::where('status',1)->get();
        $findData = PaperExam::where('id', $id)->first();
        return view('pages.admin.exam.paper-exam.edit',compact('data', 'findData','batchData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
           $coursework = PaperExam::findOrFail($id);

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
                $coverPath = $request->file('document')->store('paper-exam', 'public');
                $coursework->document = $coverPath;
            }

            // Save the updated coursework
            $coursework->save();

            // Update the associations with batches
            
            
            toast('Paper Exam Update successfully', 'success');
            return redirect()->route('paper-exam.index')->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        $item = PaperExam::findOrFail($id);
        $item->delete();

    // Redirect back or to a different page after deletion
    toast('Paper Exam Delete successfully', 'success');
    return redirect()->route('paper-exam.index');
    }
}
