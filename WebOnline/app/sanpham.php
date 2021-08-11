<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    protected $primaryKey = "id_SP";
    protected $table = "sanpham";
    protected $guarded = [];
}
