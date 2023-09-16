<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Workshop::all();
        $batchData = Batch::where('status', 1)->get();
        return view('pages.admin.workshop.index',compact('data','batchData'));
        
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
        $workshop = new Workshop();
        $workshop->lesson_name = $request->input('lesson_name');
        $workshop->cname = ''; // You need to define where 'cname' comes from
        $workshop->vlink = $request->input('vlink');
        $workshop->publish_date = Carbon::parse($request->input('publish_date'))->format('Y-m-d');
        $workshop->start_time = date('H:i:s', strtotime($request->input('start_time')));
        $workshop->end_time = date('H:i:s', strtotime($request->input('end_time')));
        $workshop->status = $request->input('status');
        $workshop->cover = ''; // You need to handle the cover image separately

        // Handle the 'cover' file upload
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('workshop', 'public');
            $workshop->cover = $coverPath;
        }

        // Convert selected batch IDs to a JSON array
        

        $workshop->save();
        
        toast('Lesson Create successfully', 'success');
        return redirect()->route('workshop.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Workshop $workshop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Workshop::all();
        $findData = Workshop::where('id', $id)->first();
        return view('pages.admin.workshop.edit',compact('data', 'findData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            // Validate the form data
           

            // Find the Workshop by ID
            $workshop = Workshop::findOrFail($id);

            // Update the workshop data
            $workshop->lesson_name = $request->input('lesson_name');
            $workshop->status = $request->input('status');
            $workshop->publish_date = Carbon::parse($request->input('publish_date'))->format('Y-m-d');
            $workshop->vlink = $request->input('vlink');
            $workshop->start_time = date('H:i:s', strtotime($request->input('start_time')));
            $workshop->end_time = date('H:i:s', strtotime($request->input('end_time')));

            // Handle the 'cover' file upload
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('workshop', 'public');
                $workshop->cover = $coverPath;
            }

            // Save the updated workshop
            $workshop->save();
            toast('Lesson Update successfully', 'success');
            return redirect()->route('workshop.index')->with('success', 'Workshop updated successfully.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Workshop::findOrFail($id);
        $item->delete();

    // Redirect back or to a different page after deletion
    toast('Workshop Delete successfully', 'success');
    return redirect()->route('batch.index');
    }
}
