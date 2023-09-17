<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;



    public static function sumAmountForStatusAndIndexNumber($indexNumber, $status)
    {
        return self::where('index_number', $indexNumber)
            ->where('status', $status)
            ->sum('amount');
    }
}
