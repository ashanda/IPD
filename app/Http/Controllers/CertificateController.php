<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Batch;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Batch::all();
        return view('pages.admin.certificate.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function certificate(Request $request,$id){

        $data = User::whereJsonContains('batch', $id)->where('status',1)->where('type',0)->get();
        return view('pages.admin.certificate.userlist',compact('data'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'index_number' => 'required|string|unique:certificates', // Assuming 'index_number' must be unique in the certificates table
        ]);

        // Create a new certificate with the provided 'index_number'
        $certificate = new Certificate([
            'index_number' => $request->input('index_number'),
            // Add other certificate fields as needed
        ]);

        // Save the certificate to the database
        $certificate->save();
        $phone = user_data($certificate->index_number)->contact_number;
        $message = "Congratulations ! You have successfully completed the course with IPD Your Digitalized certificate is now ready to download...Or Request Hardcopy of the Certificate by contact 0772795443. Thank you";
        sendSMS($phone,$message);
        toast('Certificate issued successfully', 'success');
        // Optionally, you can redirect to a success page or perform other actions here
        return redirect()->back()->with('success', 'Certificate issued successfully');
    }


    public function download(){
            $usersWithCertificates = User::join('certificates', 'users.index_number', '=', 'certificates.index_number')
                ->where('users.index_number', '=', Auth::user()->index_number)
                ->select('users.*', 'certificates.issue_date')
                ->first();

          //  $pdf = PDF::loadView('pages.user.certificate.certificate', compact('usersWithCertificates'));
          //  return $pdf->download('filename.pdf');
         return view('pages.user.certificate.certificate',compact('usersWithCertificates'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
