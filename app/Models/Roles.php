<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = ['name','guard_name'];

    public function UserInverseRel(){
       return $this->belongsTo(User::class,'role_id','id');
    }
// this relatiom is with rolreHas Permission modle
    
    public function RoleHasPermissions_Role(){
       return $this->belongsTo(RoleHasPermissions::class,'role_id','id');
    }


     

}
