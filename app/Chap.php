<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chap extends Model
{
    protected $fillable = [
        'chap_id',
        'chap_name',
        'image'
    ];
    //Table
    protected $table = 'chapters';
    //    pk key
    public $primaryKey = 'manga_chap_id';

    public  $timestamps = true;

    public function chap_to_manga(){
        return $this->belongsTo('App\Manga');

    }
}
