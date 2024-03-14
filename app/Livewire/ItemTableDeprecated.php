<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ItemTable extends Component
{
    use WithPagination;

    public $search = '';

    #[On('itemAdded')]
    public function render()
    {
        return view('livewire.item-table', [
            'items' => Item::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('brand', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->paginate(50)
        ]);
    }
}
