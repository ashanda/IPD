<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
class PaymentController extends Controller
{
    /**Support\Support\Facades\Auth
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersWithPayments = User::where('type', 0)
                            ->join('payments', 'users.index_number', '=', 'payments.index_number')
                            ->select('users.index_number', 'users.fname', 'users.lname','users.batch' ,'payments.*')
                            ->get();
        $batchData = Batch::where('status', 1)->get();                    
        return view('pages.admin.payment.index',compact('usersWithPayments','batchData'));                    

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
        

        $oldSlipCheck = Payment::where('index_number',Auth::user()->index_number)->where('status',2)->latest('created_at')->first();
        if ($oldSlipCheck == null) {
            // Validate the form data
        $request->validate([
            'customRadio' => 'required', // Ensure a payment type is selected
            'file' => 'nullable|file|mimes:pdf,jpeg,png|max:2048', // Validate file upload
        ]);

        // Create a new Payment model instance
        $payment = new Payment();

        // Set the payment type
        $payment->payment_type = $request->input('customRadio');

        // Set the course ID and other relevant data
        // Replace 'course_id', 'amount', 'batch_id', etc. with your actual field names
        $payment->index_number = Auth::user()->index_number;
        $payment->course_id = $request->input('course_id');
        $payment->amount = $request->input('amount');
        $payment->batch_id = Auth::user()->batch;

        // Handle file upload if a file was selected

         if ($request->hasFile('slip')) {
            $fileName = $request->file('slip')->store('slips', 'public');
            $payment->file_name = $fileName;
        }
        

        // Set the status to 'pending' (you can modify this based on your logic)
        $payment->status = 2; // 2=pending

        // Save the payment record to the database
        $payment->save();

        toast('Payment submitted successfully.', 'success');
        } else {
         toast('Please wait for previous slip review.', 'error');
        }
        
        // Redirect back with a success message or handle it as needed
        return redirect()->back()->with('success', 'Payment submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
         {
        // Validate the form data
        

        // Find the payment record by ID
        $payment = Payment::findOrFail($request->pid);

        // Update the payment details based on the form input
        $payment->expired_date = Carbon::parse($request->input('expiredate'))->format('Y-m-d');
        $payment->status = $request->input('status');
        
        if ($request->input('camount') != null){
            $payment->amount = $request->input('camount'); // Your string value

        }else{
            
        }
         // Optional if you want to update the amount

        // Save the updated payment record
        $payment->save();
        toast('Payment details updated successfully.', 'success');
        // Redirect to a specific route (e.g., payment details page)
        return redirect()->route('payment.index')
            ->with('success', 'Payment details updated successfully');
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
