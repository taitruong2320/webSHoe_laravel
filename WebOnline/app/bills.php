<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    protected $primaryKey = "id_bill";
    protected $table = "bills";
    protected $guarded = [];
}
