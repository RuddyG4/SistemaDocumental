<?php

namespace App\Livewire\Reports;

use App\Models\Activity;
use Carbon\Carbon;
use Livewire\Component;

class Personalizable extends Component
{
    public $option = 'per_month';
    public $times, $data;

    public function render()
    {
        return view('livewire.reports.personalizable');
    }

    public function mount()
    {
        $this->viewPerMonth();
    }

    public function updatedOption()
    {
        if ($this->option == 'per_month') {
            $this->viewPerMonth();
        } elseif ($this->option == 'per_week') {
            $this->viewPerWeek();
        } elseif ($this->option == 'per_day') {
            $this->viewPerDay();
        }
    }

    public function setTimePerMonth()
    {
        $this->times = [];
        for ($mes = now()->format('m'); $mes >= 1; $mes--) {
            $fecha = Carbon::create(null, $mes, 1, 0, 0, 0);
            $this->times[$mes] = $fecha->format('F');
        }
    }

    public function viewPerMonth()
    {
        $this->setTimePerMonth();
        $this->data = [];
        foreach ($this->times as $index => $mes) {
            $data = Activity::whereBetween('created_at', [now()->year . '-' . $index . '-01', now()->year . '-' . $index . '-' . Carbon::create(null, $index, 1, 0, 0, 0)->daysInMonth])
                ->where('tenan_id', auth()->user()->tenan_id)
                ->get();
            $this->data[$mes] = [
                'folders_viewed' => $data->filter(fn ($activity) => $activity->activity == 'view_folder')->count(),
                'folders_downloaded' => $data->filter(fn ($activity) => $activity->activity == 'download_folder')->count(),
                'files_viewed' => $data->filter(fn ($activity) => $activity->activity == 'view_file')->count(),
                'files_downloaded' => $data->filter(fn ($activity) => $activity->activity == 'download_file')->count(),
            ];
        }
    }

    public function setTimePerWeek()
    {
        $this->times = [];
        $today = now();
        for ($i = 8; $i >= 1; $i--) {
            $time = $today->startOfWeek();
            $this->times[$time->format('Y-m-d')] = $time->endOfWeek()->format('Y-m-d');
            $time = $time->subWeek();
        }
    }

    public function viewPerWeek()
    {
        $this->setTimePerWeek();
        $this->data = [];
        foreach ($this->times as $start_week => $end_week) {
            $data = Activity::whereBetween('created_at', [$start_week, $end_week])
                ->where('tenan_id', auth()->user()->tenan_id)
                ->get();
            $this->data[$start_week] = [
                'folders_viewed' => $data->filter(fn ($activity) => $activity->activity == 'view_folder')->count(),
                'folders_downloaded' => $data->filter(fn ($activity) => $activity->activity == 'download_folder')->count(),
                'files_viewed' => $data->filter(fn ($activity) => $activity->activity == 'view_file')->count(),
                'files_downloaded' => $data->filter(fn ($activity) => $activity->activity == 'download_file')->count(),
            ];
        }
    }

    public function setTimePerDay()
    {
        $this->times = [];
        $today = now();
        for ($i = 15; $i >= 1; $i--) {
            $this->times[] = $today->format('Y-m-d');
            $today->subDay();
        }
    }

    public function viewPerDay()
    {
        $this->setTimePerDay();
        $this->data = [];
        foreach ($this->times as $time) {
            $data = Activity::whereDate('created_at', $time)
                ->where('tenan_id', auth()->user()->tenan_id)
                ->get();
            $this->data[$time] = [
                'folders_viewed' => $data->filter(fn ($activity) => $activity->activity == 'view_folder')->count(),
                'folders_downloaded' => $data->filter(fn ($activity) => $activity->activity == 'download_folder')->count(),
                'files_viewed' => $data->filter(fn ($activity) => $activity->activity == 'view_file')->count(),
                'files_downloaded' => $data->filter(fn ($activity) => $activity->activity == 'download_file')->count(),
            ];
        }
    }
}
