<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Component;

class TotalIncomes extends Component
{
    public $incomes = 0;

    public function render()
    {
        $totalIncomes = Sale::sum('total');
        if ($totalIncomes >= 1000) {
            $this->incomes = number_format($totalIncomes / 1000, 1) . 'K';
        } else {
            $this->incomes = $totalIncomes;
        }

        return view('livewire.total-incomes');
    }
}
