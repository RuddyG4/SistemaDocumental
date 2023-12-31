<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index()
    {
        return view('users.role_permission.index', [
            'permissions' => auth()->user()->getPermissions(),
        ]);
    }
}
