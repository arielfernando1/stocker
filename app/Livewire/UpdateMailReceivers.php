<?php

namespace App\Livewire;

use App\Models\Preference;
use Livewire\Component;

class UpdateMailReceivers extends Component
{
    public $report_hour = '';
    public function render()
    {
        return view('livewire.update-mail-receivers');
    }

    public function mount()
    {
        $this->report_hour = Preference::where('name', 'report_hour')->first()->value;
    }

    public function update()
    {
        $preference = Preference::where('name', 'report_hour')->first();
        if ($preference) {
            $preference->value = $this->report_hour;
            $preference->save();
        } else {
            $preference = new Preference();
            $preference->name = 'report_hour';
            $preference->value = $this->report_hour;
            $preference->save();
        }
    }
}
