<?php

namespace App\Livewire;

use App\Models\Sale;
use LivewireUI\Modal\ModalComponent;

class ShowSale extends ModalComponent
{
    public $id;
    public $sale;
    public function render()
    {
        return view('livewire.show-sale');
    }

    public function mount($id)
    {
        $this->getSaleInfo($id);
    }

    public function getSaleInfo($id)
    {
        $this->sale = Sale::find($id);
    }

    public function delete($id)
    {
        Sale::destroy($id);
        $this->closeModal();
        return redirect()->route('sell');
    }
}
