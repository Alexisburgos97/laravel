<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name','email', 'type', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function devices(){
        return $this->hasMany('App\Models\Device');
    }

    public static function technicianFilter($data)
    {
        return User::techData($data)->paginate(10);
    }

    public function scopeTechData($query, $data)
    {
        if( !empty($data) ){
            return $query->where('name', 'LIKE', "%$data%")
                ->orWhere('last_name', 'LIKE', "%$data%")
                ->orWhere('email', 'LIKE', "%$data%");
        }
    }

//    public function setPasswordAttribute($value)
//    {
//        $this->attributes['password'] = Hash::make($value);
//    }

    public function isAdmin()
    {
        return $this->type == 1;
    }

}
