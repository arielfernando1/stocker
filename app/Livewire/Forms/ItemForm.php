<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ItemForm extends Form
{
    #[Rule('required')]
    public $name;
    public $brand;
    public $cost;
    #[Rule('required')]
    public $price;
    public $description;
}
