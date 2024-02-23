<?php

namespace App\Livewire\Items;

use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class SaleHistory extends Component
{
    use WithPagination;
    public $item_id;
    public function render()
    {
        return view('livewire.items.sale-history')->with('sales', Sale::where('item_id', $this->item_id)->paginate(10));
    }
}
