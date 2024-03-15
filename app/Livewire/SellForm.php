<?php

namespace App\Livewire;

use App\Models\Business;
use App\Models\Item;
use App\Models\Sale;
use App\Models\SaleDetail;
use Livewire\Attributes\On;
use Livewire\Component;

class SellForm extends Component
{
    public Sale $sale;
    public $items = [];
    public $saleDetails = [];
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
        $this->saleDetails = SaleDetail::all();
        $this->sale = Sale::where('paid', false)->latest()->first() ?? Sale::create(
            [
                'paid' => false,
                'total' => 0,
            ]
        );
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
        $this->is_service = $item->stock ?? true;
        $this->updateMaxQuantity();
        $this->calculateTotal();
    }



    public function getItem()
    {
        return Item::find($this->selectedItem);
    }

    public function updateMaxQuantity()
    {
        $this->maxQuantity = $this->stock == null ? 100 : $this->stock;
    }

    public function calculateTotal()
    {
        $this->total = $this->price * $this->quantity;
    }

    public function updateStock()
    {
        $item = $this->getItem();
        if ($item->stock == null) {
            return;
        }
        $item->stock = $item->stock - $this->quantity;
        $item->save();
    }

    #[On('saleAdded')]
    public function checkStock($selectedItem)
    {
        $item = Item::find($selectedItem);
        if ($item->stock == null) {
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

    public function addToCart()
    {
        $this->validateInput();
        if (!$this->is_service) {
            $this->dispatch('noStock');
            return;
        }
        $itemInCart = $this->sale->saleDetails->where('item_id', $this->selectedItem)->first();
        if ($itemInCart) {
            $itemInCart->quantity += $this->quantity;
            $itemInCart->total += $this->total;
            $itemInCart->save();
            $this->updateStock();
            $this->dispatch('saleAdded', selectedItem: $this->selectedItem);
            $this->dispatch('updateSales');
            $this->resetForm();
            return;
        }

        SaleDetail::create([
            'sale_id' => $this->sale->id,
            'item_id' => $this->selectedItem,
            'quantity' => $this->quantity,
            'total' => $this->total,
        ]);

        $this->sale->total += $this->total;
        $this->sale->save();
        $this->dispatch('saleAdded', selectedItem: $this->selectedItem);
        $this->dispatch('updateSales');
        $this->resetForm();
    }

    public function saveSale()
    {
        // check if there are items in the cart
        if ($this->sale->saleDetails->count() == 0) {
            $this->dispatch('emptyCart');
            return;
        }
        $this->sale->total = $this->sale->saleDetails->sum('total');
        $this->sale->paid = true;
        $this->sale->save();
        $this->dispatch('updateSales');
        $this->resetForm();
        return redirect()->route('sell');
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
