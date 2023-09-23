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
    public $maxQuantity = 0;
    public $is_service = false;
    public $total = 0;

    public function render()
    {
        return view('livewire.sell-form');
    }

    public function mount()
    {
        $this->loadItems();
    }

    public function loadItems()
    {
        $this->items = Item::all(['id', 'name']);
    }

    public function hydrate()
    {
        $this->dispatch('select2');
    }

    public function getInfo()
    {
        $item = $this->getItem();
        $this->price = $item->price ?? 0;
        $this->stock = $item->stock ?? 0;
        $this->updateMaxQuantity();
        $this->calculateTotal();
    }

    public function getItem()
    {
        return Item::find($this->selectedItem);
    }

    public function updateMaxQuantity()
    {
        $this->maxQuantity = $this->stock;
    }

    public function calculateTotal()
    {
        $this->total = $this->price * $this->quantity;
    }

    public function updateStock()
    {
        $item = $this->getItem();
        if ($item->is_service) {
            return;
        }
        $item->stock = $item->stock - $this->quantity;
        $item->save();
    }

    public function save()
    {
        $this->validateInput();

        Sale::create([
            'item_id' => $this->selectedItem,
            'quantity' => $this->quantity,
            'total' => $this->total,
        ]);

        $this->updateStock();
        $this->resetForm();
        $this->dispatch('saleAdded');
    }

    private function validateInput()
    {
        $this->validate([
            'selectedItem' => 'required',
            'quantity' => 'required|numeric|min:1|max:' . $this->maxQuantity,
        ]);
    }

    private function resetForm()
    {
        $this->reset(['selectedItem', 'price', 'stock', 'quantity', 'total']);
    }
}
