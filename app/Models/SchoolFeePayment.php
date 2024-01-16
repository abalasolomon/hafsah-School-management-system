<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolFeePayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'term_id',
        'session_id',
        'amount_paid',
        'payment_date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
