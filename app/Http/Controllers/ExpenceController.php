<?php

namespace App\Http\Controllers;

use App\Models\Expence;
use Illuminate\Http\Request;

class ExpenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Expence::all();
        return view('pages.admin.expence.index',compact('data'));
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
            'expence_title' => 'required|string|max:255',
            'amount' => 'required',
        ]);

        // Create a new Expence instance
        $expence = new Expence();
        $expence->expence_title = $validatedData['expence_title'];
        $expence->amount = $validatedData['amount'];

        // Save the Expence record to the database
        $expence->save();
        toast('Expence added successfully', 'success');
        // Optionally, you can redirect to a success page or perform other actions here
        return redirect()->route('expence.index')->with('success', 'Expence added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expence $expence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        $data = Expence::all();
        $findData = Expence::where('id', $id)->first();
        return view('pages.admin.expence.edit',compact('data', 'findData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'expence_title' => 'required|string|max:255',
            'amount' => 'required',
        ]);

        // Find the Expence record by ID
        $expence = Expence::findOrFail($id);

        // Update the Expence record with the new data
        $expence->update([
            'expence_title' => $validatedData['expence_title'],
            'amount' => $validatedData['amount'],
        ]);
        toast('Expence updated successfully', 'success');
        // Optionally, you can redirect to a success page or perform other actions here
        return redirect()->route('expence.index')->with('success', 'Expence updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the Expence record by ID
        $expence = Expence::findOrFail($id);

        // Delete the Expence record
        $expence->delete();
        toast('Expence deleted successfully', 'success');
        // Optionally, you can redirect to a success page or perform other actions here
        return redirect()->route('expence.index')->with('success', 'Expence deleted successfully');
    }
}
