<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    // In the Expense model
    protected $fillable = ['description', 'amount', 'user_id'];

    public function user(){
            return $this->belongsTo(User::class,);
        }
    }

