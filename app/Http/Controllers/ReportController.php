<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function personalizable()
    {
        $permissions = auth()->user()->getPermissions();
        return view('reports.personalizable', compact('permissions'));
    }

    public function executive()
    {
        return view('reports.executive');
    }
}
