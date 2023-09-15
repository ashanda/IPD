<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('type',0)->get();
        return view('pages.admin.student.index',compact('data'));
    }
}
