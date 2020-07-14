<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class truyen extends Model
{
    protected $table = 'truyen';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function theloai()
    {
        return $this->belongsTo('App\TheLoai', 'id_theloai', 'id');
    }
    public function chapter(){
        return $this->hasMany('App\chapter', 'id_tentruyen', 'id');
    }
}
