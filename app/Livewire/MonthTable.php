<?php

namespace App\Livewire;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MonthTable extends Component
{
    public $date = '';
    public function render()
    {

        return view(
            'livewire.month-table',
            [
                'sales' => Sale::select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total) as total'))
                    ->whereMonth('created_at', date('m', strtotime($this->date)))
                    ->whereYear('created_at', date('Y', strtotime($this->date)))
                    ->groupBy('date')
                    ->get()
            ]
        );
    }

    public function mount()
    {
        $this->date = date('Y-m-d');
    }
}
