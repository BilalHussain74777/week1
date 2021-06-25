<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermissions extends Model
{
    use HasFactory;

    protected $fillable = ['permission_id', 'role_id'];

    public function Permissions(){
       return $this->hasOne(Permissions::class,'id','permission_id');
    }



    public function Roles(){
       return $this->hasOne(Roles::class,'id','role_id');
    }

   
    public $timestamps = false;
}
