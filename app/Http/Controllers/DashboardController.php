<?php

namespace App\Http\Controllers;

use App\Models\Documents\File;
use App\Models\Documents\Folder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'users_count' => User::where('tenan_id', Auth::user()->tenan_id)->count(),
            'total_folders' => Folder::where('tenan_id', Auth::user()->tenan_id)->count(),
            'total_files' => File::where('tenan_id', Auth::user()->tenan_id)->count(),
        ]);
    }
}
