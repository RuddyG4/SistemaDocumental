<?php

namespace App\Livewire\Reports;

use Carbon\Carbon;
use Livewire\Component;

class Personalizable extends Component
{
    public $option;
    public $title1 = 'Folders viewed', $title2 = 'Folders downloaded', $meses;
    
    public function render()
    {
        return view('livewire.reports.personalizable');
    }

    public function mount()
    {
        for ($mes = now()->format('m'); $mes >= 1; $mes--) {
            // Crea una instancia de Carbon con el primer día del mes actual
            $fecha = Carbon::create(null, $mes, 1, 0, 0, 0);
        
            // Agrega el nombre del mes al array
            $this->meses[$mes] = $fecha->format('F');
        }
    }
}
