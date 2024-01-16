<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'sold_by',
        'student_id',
        'sales_person_id',
        'total_amount',
    ];

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function soldBy()
    {
        return $this->belongsTo(User::class, 'sold_by')->withDefault();
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
