<?php

namespace App\Livewire;

use Livewire\Component;

class Select2 extends Component
{
    public $selected = null;
    public $series = [
        'ite1',
        'ite2',
        'ite3',
        'ite4',
    ];

    public function render()
    {
        return view('livewire.select2');
    }
}
