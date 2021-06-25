<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Post extends Model
{
    use HasFactory;

    protected $fillable =  ['post_titles','post_descriptions'];
    
   
}
