<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Role extends Model
{
    protected $table ='roles';

    // protected $fillable = [
    //     'name', 'description',
    // ];

    protected $guarded = ['id'];

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function setNameAttribute($name)
    {
        return $this->attributes['name'] = strtolower($name);
    }

    public function getCreatedAtAttribute($created)
    {
        return Carbon::parse($created)->format('m/d/Y');
    }

    public function getUpdatedAtAttribute($updated)
    {
        return Carbon::parse($updated)->format('m/d/Y');
    }
}
