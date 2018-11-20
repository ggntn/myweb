<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    protected $fillable = [
        'chap_id',
        'manga_name',
        'detail',
        'image'
    ];
//    pk key
    public $primaryKey = 'manga_id';
//    table
    protected $table = 'mangas';

    public  $timestamps = true;

    public function chaps(){
        return $this->hasMany('App\Chap');
    }
    public function category(){
        return $this->belongsTo('App\Role');
    }
    public function author(){
        return $this->belongsTo('App\Author');
    }


}
