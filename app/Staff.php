<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;

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
    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id_users);
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
