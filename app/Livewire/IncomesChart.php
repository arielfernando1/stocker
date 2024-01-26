<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Component;

class IncomesChart extends Component
{
    public $year = 2023;
    public $incomes = [];
    public function render()
    {
        return view('livewire.incomes-chart', [
            'incomes' => $this->refreshIncomes($this->year)
        ]);
    }

    public function updatedYear()
    {
        $this->dispatch('refreshChart');
    }

    public function refreshIncomes($year)
    {
        $incomes = Sale::selectRaw('sum(total) as total, month(created_at) as month')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $this->incomes = $incomes;
    }
}
