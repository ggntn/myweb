<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name'
    ];
    //    pk key
    public $primaryKey = 'category_id';
//    table
    protected $table = 'categories';

    public  $timestamps = true;
}
