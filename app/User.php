<?php

namespace App;
use Zizaco\Entrust\Traits\EntrustUserTrait;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use EntrustUserTrait; // add this trait to your user model




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','company'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function booking()
    {
        return $this->hasMany('App\Booking','users_id','id');
    }

    public function getMyRolesAttribute()
    {
        $id = $this->id;
        $role = User::find($id);
        $data = [];
        foreach ($role->roles as $roles)  {
          array_push($data,$roles->display_name);
        }
        $result = implode(', ', $data);
        return $result;
    }


}
