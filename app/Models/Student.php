<?php

namespace App\Models;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'guardian_id',
        'grand_father_name',
        'father_name',
        'first_name',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'tribe',
        'religion',
        'nin_no',
        'nationality',
        'image',
        'admission_number',
    ];

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class);
    }
}
