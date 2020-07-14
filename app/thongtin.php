<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thongtin extends Model
{
    protected $table = 'thongtin';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function truyen()
    {
        return $this->belongsTo('App\truyen', 'id_truyen', 'id');
    }
}
