<?php

namespace App\Livewire;

use App\Models\Sale;
use LivewireUI\Modal\ModalComponent;

class ShowSale extends ModalComponent
{
    public $sale;
    public function render()
    {
        return view('livewire.show-sale');
    }

    public function mount(Sale $sale)
    {
        $this->sale = $sale;
    }

    public function delete(Sale $sale): void
    {
        $sale->delete();
        $this->restoreStock($sale);
        $this->closeModal();
        $this->dispatch('updateSales');
    }

    public function restoreStock(Sale $sale): void
    {
        $saleItem = $sale->item;
        $saleItem->stock += $sale->quantity;
        $saleItem->save();

    }
}
