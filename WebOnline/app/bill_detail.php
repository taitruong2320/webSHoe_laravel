<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill_detail extends Model
{
    protected $primaryKey = "id";
    protected $table = "bill_detail";
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo('App\sanpham','id_SP');
    }
}
