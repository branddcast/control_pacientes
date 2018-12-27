<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol()
    {
        return $this->belongsTo('App\Models\Rol', 'Id_Rol');
    }

    public function estatus(){
        return $this->belongsTo('App\Models\Estatus', 'Id_Estatus');
    }

    public function authorizeRoles($rol)
    {
        if ($this->hasAnyRole($rol)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }

    public function hasAnyRole($rol)
    {
        if (is_array($rol)) {
            foreach ($rol as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($rol)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($rol)
    {
        if($rol == '*'){
            return true;
        }else if ($this->rol()->where('Nombre', $rol)->first()) {
            return true;
        }
        return false;
    }
}
