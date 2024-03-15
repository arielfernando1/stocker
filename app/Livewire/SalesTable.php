<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\SaleDetail;

class SalesTable extends Component
{
    public $saleDetails = [];
    public $hidden = false;
    public function render(): \Illuminate\View\View
    {
        return view('livewire.sales-table');
    }


    #[On('updateSales')]
    public function mount(): void
    {
        $this->saleDetails = SaleDetail::all();
    }

    public function toggleHidden(): void
    {
        $this->hidden = !$this->hidden;
    }
}
