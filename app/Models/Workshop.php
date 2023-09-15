<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;
     protected $fillable = [
        'lesson_name',
        'vlink',
        'publish_date',
        'start_time',
        'end_time',
        'status',
        'cover',
    ];

    public function batches()
    {
        return $this->belongsToMany(Batch::class, 'lesson_batch', 'lesson_id', 'batch_id');
    }
}
