<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhom extends Model
{
    protected $table = "nhomsanpham";
    protected $primaryKey = "id_nhom";
    protected $guarded = [];
}
