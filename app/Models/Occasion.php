<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;


class Occasion extends Model 
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'event_type',
        'phone',
        'event_date',
        'guest_count',
        'notes',
    ];

    protected $casts = [
        'event_date' => 'date',
        'guest_count' => 'integer',
    ];
}