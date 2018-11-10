<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{

    protected $fillable = [
        'detail_manga',
        'image'
    ];

    //    pk key
    public $primaryKey = 'detail_id';
//    table
    protected $table = 'details';

    public  $timestamps = true;
}
