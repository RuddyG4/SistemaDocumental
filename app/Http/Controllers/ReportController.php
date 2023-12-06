<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

    public function pdf($option)
    {
        if ($option == 'per_month') {
            $times = [];
            for ($mes = now()->format('m'); $mes >= 1; $mes--) {
                $fecha = Carbon::create(null, $mes, 1, 0, 0, 0);
                $times[$mes] = $fecha->format('F');
            }
            $data = [];
            foreach ($times as $index => $mes) {
                $activities = Activity::whereBetween('created_at', [now()->year . '-' . $index . '-01', now()->year . '-' . $index . '-' . Carbon::create(null, $index, 1, 0, 0, 0)->daysInMonth])
                    ->where('tenan_id', auth()->user()->tenan_id)
                    ->get();
                $data[$mes] = [
                    'folders_viewed' => $activities->filter(fn ($activity) => $activity->activity == 'view_folder')->count(),
                    'folders_downloaded' => $activities->filter(fn ($activity) => $activity->activity == 'download_folder')->count(),
                    'files_viewed' => $activities->filter(fn ($activity) => $activity->activity == 'view_file')->count(),
                    'files_downloaded' => $activities->filter(fn ($activity) => $activity->activity == 'download_file')->count(),
                ];
            }
            $pdf = Pdf::loadView('reports.report-pdf', [
                'option' => $option,
                'data' => $data,
                'times' => $times
            ]);
            return $pdf->stream();
        } elseif ($option == 'per_week') {
            $times = [];
            $today = now();
            for ($i = 8; $i >= 1; $i--) {
                $time = $today->startOfWeek();
                $times[$time->format('Y-m-d')] = $time->endOfWeek()->format('Y-m-d');
                $time = $time->subWeek();
            }
            $data = [];
            foreach ($times as $start_week => $end_week) {
                $activities = Activity::whereBetween('created_at', [$start_week, $end_week])
                    ->where('tenan_id', auth()->user()->tenan_id)
                    ->get();
                $data[$start_week] = [
                    'folders_viewed' => $activities->filter(fn ($activity) => $activity->activity == 'view_folder')->count(),
                    'folders_downloaded' => $activities->filter(fn ($activity) => $activity->activity == 'download_folder')->count(),
                    'files_viewed' => $activities->filter(fn ($activity) => $activity->activity == 'view_file')->count(),
                    'files_downloaded' => $activities->filter(fn ($activity) => $activity->activity == 'download_file')->count(),
                ];
            }
            $pdf = Pdf::loadView('reports.report-pdf', compact('option', 'data', 'times'));
            return $pdf->stream();
        } elseif ($option == 'per_day') {
            $times = [];
            $today = now();
            for ($i = 15; $i >= 1; $i--) {
                $times[] = $today->format('Y-m-d');
                $today->subDay();
            }
            $data = [];
            foreach ($times as $time) {
                $activities = Activity::whereDate('created_at', $time)
                    ->where('tenan_id', auth()->user()->tenan_id)
                    ->get();
                $data[$time] = [
                    'folders_viewed' => $activities->filter(fn ($activity) => $activity->activity == 'view_folder')->count(),
                    'folders_downloaded' => $activities->filter(fn ($activity) => $activity->activity == 'download_folder')->count(),
                    'files_viewed' => $activities->filter(fn ($activity) => $activity->activity == 'view_file')->count(),
                    'files_downloaded' => $activities->filter(fn ($activity) => $activity->activity == 'download_file')->count(),
                ];
            }
            $pdf = Pdf::loadView('reports.report-pdf', compact('option', 'data', 'times'));
            return $pdf->stream();
        }
    }
}
