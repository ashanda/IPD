<?php

namespace App\Http\Controllers;

use App\Models\Tute;
use App\Models\Batch;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class TuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tute::all();
        $batchData = Batch::where('status', 1)->get();
        return view('pages.admin.tute.index',compact('data','batchData'));
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
        $tute = new Tute();
        $tute->title = $request->input('title');
        $tute->cname = ''; // You need to define where 'cname' comes from
        $tute->description = $request->input('description');
        $tute->status = $request->input('status');
        $tute->document = ''; // You need to handle the cover image separately


        // Handle the 'cover' file upload
        if ($request->hasFile('document')) {
            $coverPath = $request->file('document')->store('course_work', 'public');
            $tute->document = $coverPath;
        }

        // Convert selected batch IDs to a JSON array
        $batchIds = $request->input('bid', []);
        $tute->bid = json_encode($batchIds);

        $tute->save();
        
        toast('Tute create successfully', 'success');
        return redirect()->route('tute.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tute $tute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Tute::all();
        $batchData = Batch::where('status',1)->get();
        $findData = Tute::where('id', $id)->first();
        return view('pages.admin.tute.edit',compact('data', 'findData','batchData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            $tute = Tute::findOrFail($id);

            // Update the tute data
            $tute->title = $request->input('title');
            $tute->status = $request->input('status');
            $tute->description = $request->input('description');
            $batchIds = $request->input('bid', []);
            $tute->bid = json_encode($batchIds);
            // Handle the 'cover' file upload
            if ($request->hasFile('document')) {
                $coverPath = $request->file('document')->store('tute', 'public');
                $tute->document = $coverPath;
            }

            // Save the updated tute
            $tute->save();

            // Update the associations with batches
            
            toast('Tute wpdate successfully', 'success');
            return redirect()->route('tute.index')->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Tute::findOrFail($id);
        $item->delete();

    // Redirect back or to a different page after deletion
    toast('Tute delete successfully', 'success');
    return redirect()->route('tute.index');
    }
}
