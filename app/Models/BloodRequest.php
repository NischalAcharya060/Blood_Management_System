<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    protected $fillable = [
        'donor_id',
        'blood_type',
        'quantity',
        'description',
        'fulfilled',
    ];

    // Define the relationship with Donor
    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
