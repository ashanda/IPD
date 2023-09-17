<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Notice::all();
        $batchData = Batch::where('status',1)->get();
        return view('pages.admin.notice.index',compact('data','batchData'));
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
    $validatedData = $request->validate([
        'notice' => 'required',
        'bid' => 'required|array',
        'expire_date' => 'required',
    ]);

    // Create a new notice record and store it in the database
    $notice = new Notice();
    $notice->notice = $validatedData['notice'];
    $notice->expire_date = Carbon::parse($validatedData['expire_date'])->format('Y-m-d');
    $batchIds = $request->input('bid', []);
    $notice->bid = json_encode($batchIds); // Make sure 'batch_ids' matches your database column name

    $notice->save();
    toast('Notice added successfully', 'success');
    // Redirect back with a success message or perform other actions as needed
    return redirect()->route('notice.index')->with('success', 'Notice added successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Notice::all();
        $batchData = Batch::where('status',1)->get();
        $findData = Notice::where('id', $id)->first();
        return view('pages.admin.notice.edit',compact('data', 'findData','batchData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'notice' => 'required',
            'bid' => 'required|array',
            'expire_date' => 'required|date',
        ]);

        // Find the notice record by ID
        $notice = Notice::findOrFail($id);

        // Update the notice record
        $notice->notice = $validatedData['notice'];
        $notice->expire_date = Carbon::parse($validatedData['expire_date'])->format('Y-m-d');
        $batchIds = $request->input('bid', []);
        $notice->bid = json_encode($batchIds); // Make sure 'batch_ids' matches your database column name

        $notice->save();
        toast('Notice updated successfully', 'success');
        // Redirect back with a success message or perform other actions as needed
        return redirect()->route('notice.index')->with('success', 'Notice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
        {
            // Find the notice record by ID
            $notice = Notice::findOrFail($id);

            // Delete the notice record
            $notice->delete();
            toast('Notice deleted successfully', 'success');
            // Redirect back with a success message or perform other actions as needed
            return redirect()->route('notice.index')->with('success', 'Notice deleted successfully');
        }
}
