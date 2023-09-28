<?php

namespace App\Livewire;

use App\Livewire\Forms\ItemForm;
use App\Models\Category;
use LivewireUI\Modal\ModalComponent;
use App\Models\Item;

class NewItem extends ModalComponent
{
    // public $is_service = false;
    // public $category_id;
    public $categories = [];
    public Category $category;
    // public $name;
    // public $brand;
    // public $stock;
    // public $cost;
    // public $price;
    // public $description;
    // Item form
    public ItemForm $form;
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
        $this->validate();
        // uppercase name and brand
        $this->form->name = strtoupper($this->form->name);
        $this->form->brand = strtoupper($this->form->brand);
        Item::create($this->form->all());
        // debug created item
        $this->closeModal();
        $this->dispatch('itemAdded');
    }
}
