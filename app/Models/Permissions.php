<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;
    protected $fillable = ['name','guard_name'];
    
// this relatiom is with role has permission model
     public function RoleHasPermissions_Permission(){
       return $this->belongsTo(RoleHasPermissions::class,'permission_id','id');
    }
}
