<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'index_number',
        'lname',
        'email',
        'contact_number',
        'dob',
        'coupen_code',
        'batch',
        'address',
        'password',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

        /**

     * Interact with the user's first name.

     *

     * @param  string  $value

     * @return \Illuminate\Database\Eloquent\Casts\Attribute

     */

    protected function type(): Attribute

    {

        return new Attribute(

            get: fn ($value) =>  ["user", "admin", "instructor"][$value],

        );

    }

     public function batches()
    {
        return $this->belongsToMany(Batch::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'index_number', 'index_number');
    }
 
   public function certificate()
    {
        return $this->hasOne(Certificate::class, 'index_number', 'index_number');
    }

}
