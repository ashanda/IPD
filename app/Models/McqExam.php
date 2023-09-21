<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McqExam extends Model
{
    use HasFactory;
    protected $casts = [
        'bid' => 'array', // Cast "bid" attribute to an array
    ];
}
