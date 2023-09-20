<?php

namespace App\Livewire;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;
use App\Models\Item;

class NewItem extends ModalComponent
{
    public $is_service = false;
    public $categories = [];
    public $name;
    public $brand;
    public $stock;
    public $cost;
    public $price;
    public $description;
    public function render()
    {
        return view('livewire.new-item');
    }

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required | min:3',
            'price' => 'required',
            'stock' => 'min:0',
        ]);
        // uppercase name and brand
        $this->name = strtoupper($this->name);
        $this->brand = strtoupper($this->brand);
        Item::create([
            'is_service' => $this->is_service,
            'name' => $this->name,
            'brand' => $this->brand,
            'stock' => $this->stock,
            'cost' => $this->cost,
            'price' => $this->price,
            'description' => $this->description,
        ]);
        // debug created item
        $this->closeModal();
        $this->dispatch('itemAdded');
    }
}
