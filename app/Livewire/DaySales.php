<?php

namespace App\Livewire;

use App\Models\Sale;
use Illuminate\Support\Facades\App;
use LivewireUI\Modal\ModalComponent;
use Barryvdh\DomPDF\Facade as PDF;
class DaySales extends ModalComponent
{
    public $date;
    public $sales;
    public $selectedFormat = 'pdf';
    public function render()
    {
        return view('livewire.day-sales');
    }

    public function mount()
    {
        $this->getSales();
    }

    public function getSales()
    {
        $this->sales = Sale::whereDate('created_at', $this->date)->get();
    }

    public function export()
    {
        $pdf = App::make('dompdf.wrapper');

        $pdf->loadView('myPDF');
        return $pdf->stream();
    }
}
