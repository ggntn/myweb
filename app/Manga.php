<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    protected $fillable = [
        'manga_name',
        'detail',
        'image'
    ];
//    pk key
    public $primaryKey = 'manga_id';
//    table
    protected $table = 'mangas';

    public  $timestamps = true;




}
