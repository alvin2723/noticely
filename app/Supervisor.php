<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $table = 'supervisor';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_supervisor',
        'id_users',
        'id_manager',
        'name',
        'division_id',
        'alamat',
        'phone',
    ];
}
