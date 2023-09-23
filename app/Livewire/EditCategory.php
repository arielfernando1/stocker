<?php

namespace App\Livewire;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class EditCategory extends ModalComponent
{
    public $category_id;
    public $category;
    public $name;
    public $description;
    public function render()
    {
        $this->category = Category::find($this->category_id);
        $this->name = $this->category->name;
        $this->description = $this->category->description;
        return view('livewire.edit-category');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
        ]);
        $this->category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->dispatch('categoryUpdated');
        $this->closeModal();
    }
}
