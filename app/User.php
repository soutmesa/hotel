<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='users';
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    protected $guarded = ['id','password_confirmation'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function setUserNameAttribute($username)
    {
        return $this->attributes['username'] = strtolower($username);
    }

    public function setFirstNameAttribute($firstname)
    {
        return $this->attributes['firstname'] = strtolower($firstname);
    }

    public function setLastNameAttribute($lastname)
    {
        return $this->attributes['lastname'] = strtolower($lastname);
    }

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }
}
