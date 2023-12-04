<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Documents\File;
use App\Models\Documents\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $folders = Folder::with('user')->where('tenan_id', Auth::user()->tenan_id)->where('parent_id', null)->get();
        $files = File::where('tenan_id', Auth::user()->tenan_id)->where('folder_id', null)->get();
        return response()->json([
            'folders' => $folders,
            'files' => $files
        ]);
    }

    public function getFolder(Folder $folder)
    {
        $folders = Folder::with('user')->where('tenan_id', Auth::user()->tenan_id)->where('parent_id', $folder->id)->get();
        $files = File::where('tenan_id', Auth::user()->tenan_id)->where('folder_id', $folder->id)->get();
        foreach ($files as $file) {
            $file->file_path = Storage::url($file->file_path);
        }
        return response()->json([
            'folders' => $folders,
            'files' => $files
        ]);
    }
}
