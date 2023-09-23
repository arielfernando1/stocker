<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Business;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UpdateBusinessInformation extends Component
{
    use WithFileUploads;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $ruc;
    public $logo;
    public $web;


    public function render()
    {
        return view('livewire.update-business-information');
    }

    public function mount(){
        $this->name = Business::first()->name;
        $this->address = Business::first()->address;
        $this->phone = Business::first()->phone;
        $this->email = Business::first()->email;
        $this->ruc = Business::first()->ruc;
        $this->logo = Business::first()->logo;
        $this->web = Business::first()->web;
    }

    public function updateBusinessInfo()
    {
        $this->validate([
            'name' => 'required|min:3',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'ruc' => 'required',
        ]);
        Business::first()->update([
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'ruc' => $this->ruc,
            'logo' => $this->logo,
            'web' => $this->web,
        ]);
        $this->dispatch('saved');
    }
}
