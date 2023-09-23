<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Component;

class Salescount extends Component
{
    public $salescount = 0;
    public function render()
    {
        $this->salescount = Sale::count();
        return view('livewire.salescount');
    }
}
