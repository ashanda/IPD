<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Batch::all();
        return view('pages.admin.batch.index',compact('data'));
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
    // Validate the incoming request data
    $validatedData = $request->validate([
        'bname' => 'required|string|max:255|unique:batches',
        'status' => 'required|in:Publish,Unpublish',
    ]);

    // Create a new batch and save it to the database
    $batch = Batch::create([
        'bname' => $validatedData['bname'],
        'status' => ($validatedData['status'] === 'Publish') ? 1 : 0,
    ]);

    // Check if batch creation was successful
    if ($batch) {
        toast('Batch Create successfully', 'success');
        return redirect()->route('batch.index');
    } else {
        toast('Batch Create Failed', 'error');
        return redirect()->back();
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Batch::all();
        $findData = Batch::where('id', $id)->first();
        return view('pages.admin.batch.edit',compact('data', 'findData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
        {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'bname' => 'required|string|max:255|unique:batches,bname,' . $id, // Exclude current batch from uniqueness check
                'status' => 'required|in:Publish,Unpublish',
            ]);

            // Find the batch by ID
            $batch = Batch::findOrFail($id);

            // Update the batch attributes
            $batch->update([
                'bname' => $validatedData['bname'],
                'status' => ($validatedData['status'] === 'Publish') ? 1 : 0,
            ]);
             toast('Batch Update successfully', 'success');
            // Redirect back or to a different page after update
            return redirect()->route('batch.index')->with('success', 'Batch updated successfully');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Batch::findOrFail($id);
        $item->delete();

    // Redirect back or to a different page after deletion
    toast('Batch Delete successfully', 'success');
    return redirect()->route('batch.index');
    }

}
