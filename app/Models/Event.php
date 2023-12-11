<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['event_name',
    'event_host', 
    'event_type', 
    'groom', 
    'bride', 
    'location',
    'venue',
    'date',
    'time',
    'contacts'
    ];
}
