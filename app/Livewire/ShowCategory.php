<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowCategory extends Component
{
    public Category $category;

    #[On('categoryUpdated')]
    public function render()
    {
        return view('livewire.show-category');
    }
}
