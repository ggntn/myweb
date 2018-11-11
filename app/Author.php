<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'author_name'
    ];

    //    pk key
    public $primaryKey = 'author_id';
//    table
    protected $table = 'authors';

    public  $timestamps = true;
}
