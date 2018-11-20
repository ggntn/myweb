<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chap extends Model
{
    protected $fillable = [
        'chap_name',
        'image'
    ];
    //Table
    protected $table = 'chapters';
    //    pk key
    public $primaryKey = 'manga_chap_id';

    public  $timestamps = true;

}
