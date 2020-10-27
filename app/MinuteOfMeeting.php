<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinuteOfMeeting extends Model
{
    protected $table = 'mom';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_mom',
        'date_mom',
        'start_mom',
        'end_mom',
        'objective_mom',
        'decision_made',
        'attendees',
        'status',
    ];
}
