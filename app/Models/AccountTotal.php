<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountTotal extends Model
{
    use HasFactory;
    protected $fillable = ['total_amount'];
}
