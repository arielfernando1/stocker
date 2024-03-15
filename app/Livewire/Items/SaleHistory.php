<?php

namespace App\Livewire\Items;

use App\Models\Sale;
use App\Models\SaleDetail;
use Livewire\Component;
use Livewire\WithPagination;

class SaleHistory extends Component
{
    use WithPagination;
    public $item_id;
    public function render()
    {
        return view('livewire.items.sale-history')->with('sales', SaleDetail::where('item_id', $this->item_id)->paginate(10));
    }
}
