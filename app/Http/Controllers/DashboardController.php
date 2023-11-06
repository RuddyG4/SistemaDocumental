<?php

namespace App\Http\Controllers;

use App\Models\Documents\File;
use App\Models\Documents\Folder;
use App\Models\RevisorFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        // $revisors_files = $user->revisor_file;
        $revisors_files = RevisorFile::where('user_id', $user->id)
                                     ->where('estado_file_id', 2)
                                     ->get();
        $cantidad_pendientes_revision = count($revisors_files);
        // return view('dashboard', compact('cantidad_pendientes_revision'));
        return view('dashboard', [
            'users_count' => User::where('tenan_id', Auth::user()->tenan_id)->count(),
            'total_folders' => Folder::where('tenan_id', Auth::user()->tenan_id)->count(),
            'total_files' => File::where('tenan_id', Auth::user()->tenan_id)->count(),
            'cantidad_pendientes_revision' => $cantidad_pendientes_revision
        ]);
    }
}
