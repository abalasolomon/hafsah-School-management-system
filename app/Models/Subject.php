<?php

namespace App\Models;

use App\Models\Term;
use App\Models\Classes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    protected $fillable = [
        'name',
        // Add more fields as needed
    ];

    public function classes()
    {
        return $this->belongsToMany(Classes::class);
    }
    
    public function terms()
    {
        return $this->belongsToMany(Term::class, 'classes_subject_term', 'subject_id', 'term_id')
            ->withPivot('classes_id');
    }
}
