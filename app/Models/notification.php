<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';

    protected $fillable = [
        'sender_id',
        'receiver_type',
        'emergency',
        'title',
        'body',
        'expiry_date',
    ];

}
