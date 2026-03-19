<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
    'event_type',
    'event_date',
    'event_state',
    'is_private_residence',
    'alcohol_served',
    'guest_count',
    'activities',
    'venue_requirements',
    'event_description',
    'insured_name',
    'insured_address',
    'insured_city',
    'insured_state',
    'insured_zip'
];
}
