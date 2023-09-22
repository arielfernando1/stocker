<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Sale;
use Livewire\Component;

class SellForm extends Component
{
    public $items = [];
    public $selectedItem = null;
    public $price = 0;
    public $stock = 0;
    public $quantity = 1;
    public $is_service = false;

    public $total = 0;
    public function render()
    {
        return view('livewire.sell-form');
    }

    public function mount()
    {
        $this->items = Item::all(
            ['id', 'name']
        );
    }

    public function hydrate()
    {
        $this->dispatch('select2');
    }

    public function getInfo()
    {
        $item = Item::find($this->selectedItem);
        $this->price = $item->price ?? 0;
        $this->stock = $item->stock ?? 0;
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = $this->price * $this->quantity;
    }

    public function updateStock()
    {
        $item = Item::find($this->selectedItem);
        $item->stock = $item->stock - $this->quantity;
        $item->save();
    }

    public function save()
    {
        // validate
        $this->validate([
            'selectedItem' => 'required',
            'quantity' => 'required|numeric|min:1'
        ]);
        Sale::create([
            'item_id' => $this->selectedItem,
            'quantity' => $this->quantity,
            'total' => $this->total,
        ]);
        $this->updateStock();
        $this->reset(['selectedItem', 'price', 'stock', 'quantity', 'total']);
        $this->dispatch('saleAdded');
    }
}
