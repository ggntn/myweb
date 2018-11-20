<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sluggable;

class Role extends Model
{
    protected $fillable = [
        'role_name',
        'slug'
    ];

    public $primaryKey = 'role_id';

    public function users()
    {
        return $this->hasMany('App\User');
    }




}
