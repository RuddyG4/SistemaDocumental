<?php

namespace App\Http\Controllers;

use App\Models\Activity;
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
        $revisors_files = RevisorFile::where('user_id', $user->id)
                                     ->where('estado_file_id', 2)
                                     ->get();
        $cantidad_pendientes_revision = count($revisors_files);
        $activities = Activity::where('tenan_id', Auth::user()->tenan_id)->get();
        $data = [
            'folders_created' => $activities->filter(fn ($activity) => $activity->activity == 'create_folder')->count(),
            'folders_viewed' => $activities->filter(fn ($activity) => $activity->activity == 'view_folder')->count(),
            'folders_downloaded' => $activities->filter(fn ($activity) => $activity->activity == 'download_folder')->count(),
            'files_uploaded' => $activities->filter(fn ($activity) => $activity->activity == 'upload_file')->count(),
            'files_viewed' => $activities->filter(fn ($activity) => $activity->activity == 'view_file')->count(),
            'files_downloaded' => $activities->filter(fn ($activity) => $activity->activity == 'download_file')->count()
        ];
        return view('dashboard', [
            'users_count' => User::where('tenan_id', Auth::user()->tenan_id)->count(),
            'total_folders' => Folder::where('tenan_id', Auth::user()->tenan_id)->count(),
            'total_files' => File::where('tenan_id', Auth::user()->tenan_id)->count(),
            'cantidad_pendientes_revision' => $cantidad_pendientes_revision,
            'permissions' => Auth::user()->getPermissions(),
            'data' => $data
        ]);
    }
}
