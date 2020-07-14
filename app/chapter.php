<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chapter extends Model
{
    protected $table = 'chapter';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function linktruyen()
    {
        return $this->hasMany('App\linkTruyen', 'id_chapter', 'id');
    }
    public function truyen()
    {  
        return $this->belongsTo('App\truyen', 'id_tentruyen', 'id');
    }
}
