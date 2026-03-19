<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerProfile extends Model
{
    protected $fillable = [
        'user_id',
        'business_name',
        'street',
        'city',
        'state',
        'zip',
        'license_number',
        'max_capacity',
        'years_experience',
        'referral_source',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}