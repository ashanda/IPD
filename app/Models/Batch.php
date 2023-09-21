<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $fillable = ['bname', 'status'];

    public function instructors()
    {
        return $this->belongsToMany(User::class);
    }

    public function students()
{
    return $this->belongsToMany(User::class);
}

}
