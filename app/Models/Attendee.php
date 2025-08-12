<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $table = 'night_of_blessings_registrations';
    
    protected $fillable = [
        'title',
        'first_name',
        'surname',
        'email',
        'phone_number',
        'kingschat_handle',
        'group_church',
        'church',
        'attendance_status',
        'volunteer_functions',
        'registered_at'
    ];
    
    protected $dates = ['registered_at'];
}
