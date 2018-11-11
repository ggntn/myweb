<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = [
        'title_name',

    ];

    //    pk key
    public $primaryKey = 'title_id';
//    table
    protected $table = 'titles';

    public  $timestamps = true;
}
