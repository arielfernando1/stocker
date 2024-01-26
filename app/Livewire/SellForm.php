<?php

namespace App\Livewire;

use App\Models\Business;
use App\Models\Item;
use App\Models\Sale;
use Livewire\Attributes\On;
use Livewire\Component;

class SellForm extends Component
{
    public $items = [];
    public $selectedItem = null;
    public $price = 0;
    public $stock = 0;
    public $quantity = 1;
    public $maxQuantity = 0;
    public $is_service = true;
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
        $this->items = Item::all(['id', 'name', 'brand']);
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
        $this->is_service = $item->is_service ?? false;
        $this->updateMaxQuantity();
        $this->calculateTotal();
    }

    public function getItem()
    {
        return Item::find($this->selectedItem);
    }

    public function updateMaxQuantity()
    {
        $this->maxQuantity = $this->is_service ? 1000 : $this->stock;
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

    #[On('saleAdded')]
    public function checkStock($selectedItem)
    {
        $item = Item::find($selectedItem);
        if ($item->is_service) {
            return;
        }
        if ($item->stock == 0) {
            $this->sendStockAlert($item);
        }
    }

    public function sendStockAlert($item)
    {
        try {
            $businessEmail = Business::first()->email;
            if (!$businessEmail) {
                return;
            }
            $this->sendEmail($item, $businessEmail);
        } catch (\Exception $e) {
            $this->dispatch('emailError', $e->getMessage());
        }
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
        $this->dispatch('saleAdded', selectedItem: $this->selectedItem);
        $this->dispatch('updateSales');
        $this->resetForm();
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
