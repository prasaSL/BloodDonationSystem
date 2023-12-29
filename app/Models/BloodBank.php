<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    use HasFactory;

    protected $table = 'blood_banks';
    
    protected $fillable = [
        'b_name',
        'location',
        'phone',
    ];
}
