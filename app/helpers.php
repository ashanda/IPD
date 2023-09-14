<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Batch;


function getAllactiveBatch(){
    $batches = Batch::where('status', 1)->get();
    return $batches;
}

function getBatch($id){
    $batches = Batch::where('id', $id)->first();
    return $batches;
}



