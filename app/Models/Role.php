<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function role(){
        return $this->hasMany(User::class,"role_id");
    }

    public function userRole(){
        return $this->hasMany(User_role::class,'role_id');
    }
}
