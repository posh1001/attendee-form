<?php

// app/Models/Attendee.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $fillable = [
        'title',
        'first_name',
        'surname',
        'phone_number',
        'kingschat_handle',
        'group_church',
        'attendance_status',
        'volunteer_functions',
    ];
}

