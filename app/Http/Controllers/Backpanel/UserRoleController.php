<?php

namespace App\Http\Controllers\Backpanel;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    //
    public function Role()
    {
        return $this->belongsTo(Role::class,"role");
    }
}
