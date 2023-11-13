<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Users\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::with('user')->where('tenan_id', auth()->user()->tenan_id)->orderByDesc('created_at')->paginate();
        $permissions = auth()->user()->getPermissions();
        return view('users.log-index', compact('permissions', 'logs'));
    }
}
