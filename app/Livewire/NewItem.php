<?php

namespace App\Livewire;

use App\Livewire\Forms\ItemForm;
use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class NewItem extends ModalComponent
{
    public $categories = [];
    public Category $category;
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
        $this->form->store();
        $this->closeModal();
        $this->dispatch('itemAdded');
    }

    public function updatedFormCost()
    {
        $this->form->calculatePrice();
    }

    public function updatedFormPrice()
    {
        $this->form->calculateProfit();
    }

    public function updatedFormProfit()
    {
        $this->form->calculatePrice();
    }
}
