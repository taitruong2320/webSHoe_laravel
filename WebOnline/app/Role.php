<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Role extends Model
{
    protected $primaryKey = "id_roles";
    protected $table = "roles";
    protected $guarded = [];
    protected $fillable =['name','slug','permissions'];
    public function users()
    {
        return $this->belongsToMany(User::class,'roles_user');
    }
}
