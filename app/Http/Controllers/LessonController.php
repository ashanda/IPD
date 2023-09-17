<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Lesson::all();
        $batchData = Batch::where('status', 1)->get();
        return view('pages.admin.lesson.index',compact('data','batchData'));
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
        // $request->validate([
        //     'lesson_name' => 'required|string|max:255',
        //     'vlink' => 'required|string|max:255',
        //     'publish_date' => 'required',
        //     'start_time' => 'required',
        //     'end_time' => 'required',
        //     'bid' => 'required|array', // Assuming 'bid' is an array
        //     'status' => 'required',
        //     'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming 'cover' is an image upload field
        // ]);
        
        // Store the lesson data in the database
        $lesson = new Lesson();
        $lesson->lesson_name = $request->input('lesson_name');
        $lesson->cname = ''; // You need to define where 'cname' comes from
        $lesson->vlink = $request->input('vlink');
        $lesson->publish_date = Carbon::parse($request->input('publish_date', '15 September 2023'))->format('Y-m-d');
        $lesson->start_time = date('H:i:s', strtotime($request->input('start_time')));
        $lesson->end_time = date('H:i:s', strtotime($request->input('end_time')));
        $lesson->status = $request->input('status');
        $lesson->cover = ''; // You need to handle the cover image separately


        // Handle the 'cover' file upload
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $lesson->cover = $coverPath;
        }

        // Convert selected batch IDs to a JSON array
        $batchIds = $request->input('bid', []);
        
        $lesson->bid = json_encode($batchIds);

        $lesson->save();
        
        toast('Lesson Create successfully', 'success');
        return redirect()->route('lesson.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Lesson::all();
        $batchData = Batch::where('status',1)->get();
        $findData = Lesson::where('id', $id)->first();
        return view('pages.admin.lesson.edit',compact('data', 'findData','batchData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);

            // Update the lesson data
            $lesson->lesson_name = $request->input('lesson_name');
            $lesson->status = $request->input('status');
            $lesson->publish_date = Carbon::parse($request->input('publish_date'))->format('Y-m-d');
            $lesson->vlink = $request->input('vlink');
            $lesson->start_time = date('H:i:s', strtotime($request->input('start_time')));
            $lesson->end_time = date('H:i:s', strtotime($request->input('end_time')));

            // Handle the 'cover' file upload
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('covers', 'public');
                $lesson->cover = $coverPath;
            }
            $batchIds = $request->input('bid', []);
        
            $lesson->bid = json_encode($batchIds);
            // Save the updated lesson
            $lesson->save();

            // Update the associations with batches
           
            
            toast('Lesson Update successfully', 'success');
            return redirect()->route('lesson.index')->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Lesson::findOrFail($id);
        $item->delete();

    // Redirect back or to a different page after deletion
    toast('Lesson Delete successfully', 'success');
    return redirect()->route('batch.index');
    }
}
