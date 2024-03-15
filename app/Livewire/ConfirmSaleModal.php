<?php

namespace App\Livewire;

use App\Models\Sale;
use LivewireUI\Modal\ModalComponent;

class ConfirmSaleModal extends ModalComponent
{
    public Sale $sale;
    public $total;
    public $payment = 0;
    public $amount = 0;
    public function render()
    {
        return view('livewire.confirm-sale-modal');
    }

    public function mount(Sale $sale)
    {
        $this->total = $sale->total;
    }

    public function calculateChange($amount)
    {

        return number_format($amount - $this->total, 2);
    }

    public function confirmSale()
    {
        if ($this->sale->saleDetails->isEmpty()) {
            return;
        }
        $this->sale->update([
            'paid' => true,
        ]);
        $this->dispatch('updateSales');
        $this->closeModal();
        return redirect()->route('sell');
    }

    public function printTicket()
    {
        $this->confirmSale();
        return redirect()->route('print', $this->sale);
    }

    public function updatedPayment($value)
    {
        $this->amount = $this->calculateChange($value);
    }
}
