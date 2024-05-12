<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    protected $fillable = [
        'patient_name',
        'age',
        'blood_type',
        'quantity',
        'hospital_name',
        'hospital_location',
        'map_coordinates',
        'contact_info',
        'fulfilled',
    ];

}
