<?php

namespace App\Livewire;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class NewCategory extends ModalComponent
{
    public $name;
    public $description;
    public function render()
    {
        return view('livewire.new-category');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required | min:3',
        ]);
        $this->name = strtoupper($this->name);
        Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->closeModal();
        $this->dispatch('categoryAdded');
    }
}
