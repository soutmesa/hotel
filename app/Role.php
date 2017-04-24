<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table ='roles';

    protected $fillable = [
        'name', 'description',
    ];

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function setNameAttribute($name)
    {
        return $this->attributes['name'] = strtolower($name);
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
