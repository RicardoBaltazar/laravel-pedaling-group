<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    protected $table = "rides";

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'start_date',
        'start_date_registration',
        'end_date_registration',
        'additional_information',
        'start_place',
        'participants_limit',
    ];
}
