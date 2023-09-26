<?php

namespace App\Http\Controllers;

use App\Models\Coupen;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CoupenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Coupen::all();
        $batchData = Batch::where('status',1)->get();
        return view('pages.admin.coupen.index',compact('data','batchData'));
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
        'coupen' => 'required',
        'amount' => 'required|numeric|min:10',
        'bid' => 'required|array',
        'valid_date' => 'required',
    ]);

    // Create a new coupon record and store it in the database
    $coupon = new Coupen();
    $coupon->coupon_code = $validatedData['coupen'];
    $coupon->percentage = $validatedData['amount'];
    $coupon->valid_date = Carbon::parse($validatedData['valid_date'])->format('Y-m-d');
    $batchIds = $request->input('bid', []);
    $coupon->bid = $batchIds;

    $coupon->save();
    
    toast('Coupon added successfully', 'success');
    // Redirect back with a success message or perform other actions as needed
    return redirect()->route('coupen.index')->with('success', 'Coupon added successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Coupen $coupen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Coupen::all();
        $batchData = Batch::where('status',1)->get();
        $findData = Coupen::where('id', $id)->first();
        return view('pages.admin.coupen.edit',compact('data', 'findData','batchData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the form data
    $validatedData = $request->validate([
        'coupen' => 'required', // Replace 'your_coupen_table_name'
        'amount' => 'required|numeric|min:10',
        'bid' => 'required|array',
        'valid_date' => 'required',
    ]);

    // Find the coupon record by ID
    $coupon = Coupen::findOrFail($id);

    // Update the coupon record
    $coupon->coupon_code = $validatedData['coupen'];
    $coupon->percentage = $validatedData['amount'];
    $coupon->valid_date = Carbon::parse($validatedData['valid_date'])->format('Y-m-d');
    $batchIds = $request->input('bid', []);
    $coupon->bid = $batchIds; // Make sure 'batch_ids' matches your database column name

    $coupon->save();
    toast('Coupon updated successfully', 'success');
    // Redirect back with a success message or perform other actions as needed
    return redirect()->route('coupen.index')->with('success', 'Coupon updated successfully');
}

public function destroy($id)
{
    // Find the coupon record by ID
    $coupon = Coupen::findOrFail($id);

    // Delete the coupon record
    $coupon->delete();
    toast('Coupon deleted successfully', 'success');
    // Redirect back with a success message or perform other actions as needed
    return redirect()->route('coupen.index')->with('success', 'Coupon deleted successfully');
}
}
