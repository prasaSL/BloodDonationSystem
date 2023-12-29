<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DSchedule extends Model
{
    protected $table = 'd-schedule';
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'blood_bank_id',
        'blood_group',
        'date',
        'time',
        'donated',
        'is_approved',
    ];
}
