<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mileage extends Model
{
    use HasFactory;
    protected $fillable = [
        'morning_reading',
        'evening_reading',
        'number_plate',
        'mileage',
    ];
}
