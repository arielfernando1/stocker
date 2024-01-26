<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Component;

class IncomesChart extends Component
{
    public function render()
    {
        return view('livewire.incomes-chart', [
            // total sales by month
            'incomes' => Sale::selectRaw('sum(total) as incomes, month(created_at) as month')
                ->whereYear('created_at', date('Y'))
                ->groupBy('month')
                ->pluck('incomes', 'month')
        ]);
    }
}
