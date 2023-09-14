<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['bid', 'cname','fee'];
    protected $casts = [
        'bid' => 'array', // Cast "bid" attribute to an array
    ];
}
