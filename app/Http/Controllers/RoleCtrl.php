<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleCtrl extends Controller
{
    public function getRole()
    {
        return Role::select('id', 'role')->get();
    }
}
