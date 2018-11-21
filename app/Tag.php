<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function mangas(){
        return $this->belongsToMany('App\Manga','manga_tag','tag_id','manga_id');
    }


    protected $fillable = ['name'];

    public $primaryKey = 'id';
}
