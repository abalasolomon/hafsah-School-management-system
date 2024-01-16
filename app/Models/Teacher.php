<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'date_of_birth',
        'place_of_birth',
        'gender',
        'marital_status',
        'highest_qualification',
        'residential_address',
        'nearest_landmark',
        'mobile_number',
        'email',
        'bank',
        'bank_account_number',
        // Add more fields as needed
    ];

    // Add relationships or other methods if necessary
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function classes()
    {
        return $this->hasMany(Classes::class);
    }
}
