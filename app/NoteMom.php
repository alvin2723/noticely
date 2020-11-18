<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteMom extends Model
{
    protected $table = 'note_mom';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_mom',
        'note_desc',

    ];
}
