<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_staff',
        'id_users',
        'id_supervisor',
        'name',
        'division_id',
        'alamat',
        'phone',
    ];
}
