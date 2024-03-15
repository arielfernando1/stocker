<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\SaleDetail;

class SalesTable extends Component
{
    public $saleDetails = [];
    public $sale;
    public $hidden = false;
    public function render(): \Illuminate\View\View
    {
        return count($this->saleDetails) ? view('livewire.sales-table') : view('livewire.no-data');
    }


    #[On('updateSales')]
    public function mount(): void
    {
        $this->saleDetails = SaleDetail::where('sale_id', $this->sale->id)->get();
    }

    public function toggleHidden(): void
    {
        $this->hidden = !$this->hidden;
    }
    public function deleteSaleDetail(int $id): void
    {
        SaleDetail::find($id)->delete();
        $this->saleDetails = SaleDetail::where('sale_id', $this->sale->id)->get();
        $this->sale->update([
            'total' => $this->saleDetails->sum('total')
        ]);
    }
}
