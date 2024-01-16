<?php

namespace App\Models;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guardian extends Model
{
    use HasFactory;
    protected $fillable = [
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
        'relation',
        'marital_status',
        'email',
        'phone_number',
        'whatsapp_number',
        'work_place',
        'occupation',
        'postal_code',
        'p_o_box',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
