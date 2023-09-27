<?php

namespace App\Livewire;

use App\Models\Sale;
use LivewireUI\Modal\ModalComponent;

class DaySales extends ModalComponent
{
    public $date = '';
    public $sales;
    public function render()
    {
        return view('livewire.day-sales');
    }

    public function mount($date)
    {
        $this->date = $date;
        $this->getSales();
    }

    public function getSales()
    {
        $this->sales = Sale::whereDate('created_at', $this->date)->get();
    }
}
