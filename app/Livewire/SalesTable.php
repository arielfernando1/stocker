<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Sale;

class SalesTable extends Component
{
    public $sales;
    public $hidden = false;
    public function render(): \Illuminate\View\View
    {
        return $this->sales->count() ? view('livewire.sales-table') : view('livewire.no-data');
    }


    #[On('updateSales')]
    public function mount(): void
    {
        $this->sales = Sale::whereDate('created_at', date('Y-m-d'))->get();
    }

    public function toggleHidden(): void
    {
        $this->hidden = !$this->hidden;
    }
}
