<?php
// app/Models/Cart.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'inventory_id',
        'quantity',
        // Add other fields as needed
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}

