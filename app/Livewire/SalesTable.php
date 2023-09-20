<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Sale;

class SalesTable extends Component
{
    public $sales = [];
    public $hidden = false;
    public function render()
    {
        return view('livewire.sales-table');
    }


    #[On('saleAdded')]
    public function mount()
    {
        $this->sales = Sale::whereDate('created_at', date('Y-m-d'))->get();
    }

    public function toggleHidden()
    {
        $this->hidden = !$this->hidden;
    }
}
