<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hospitals extends Model
{
    use HasFactory;

    protected $table = 'hospitals';
    protected $fillable = [
        'name',
        'location',
        'phone',
    ];
}
