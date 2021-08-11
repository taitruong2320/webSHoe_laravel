<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $primaryKey = "id_NV";
    protected $table = "nhanvien";
    protected $guarded = [];
}
