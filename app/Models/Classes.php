<?php

namespace App\Models;

use App\Models\Term;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    protected $fillable = [
        'name',
        // Add more fields as needed
    ];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
    public function terms()
    {
        return $this->belongsToMany(Term::class, 'classes_subject_term', 'classes_id', 'term_id')
            ->withPivot('subject_id');
    }
    
}
 