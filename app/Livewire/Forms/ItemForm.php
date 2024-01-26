<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ItemForm extends Form
{
    public Item $item;
    #[Rule('required')]
    public $is_service = false;
    #[Rule('required')]
    public $category_id;
    #[Rule('required|string|max:255|min:3')]
    public $name;
    public $brand;
    public $stock;
    public $cost;
    #[Rule('required')]
    public $price;
    public $profit = 30;
    public $description;

    protected $messages = [
        'category_id.required' => 'La categoría es requerida',
        'name.required' => 'El nombre es requerido',
        'name.string' => 'El nombre debe ser una cadena de caracteres',
        'name.max' => 'El nombre debe tener máximo 255 caracteres',
        'name.min' => 'El nombre debe tener mínimo 3 caracteres',
        'brand.string' => 'La marca debe ser una cadena de caracteres',
        'brand.max' => 'La marca debe tener máximo 255 caracteres',
        'brand.min' => 'La marca debe tener mínimo 3 caracteres',
        'stock.integer' => 'El stock debe ser un número entero',
        'cost.integer' => 'El costo debe ser un número entero',
        'price.required' => 'El precio es requerido',
        'price.integer' => 'El precio debe ser un número entero',
        'description.string' => 'La descripción debe ser una cadena de caracteres',
        'description.max' => 'La descripción debe tener máximo 255 caracteres',
        'description.min' => 'La descripción debe tener mínimo 3 caracteres',
    ];

    public function setItem(Item $item)
    {
        $this->item = $item;
        $this->is_service = $item->is_service;
        $this->category_id = $item->category_id;
        $this->name = $item->name;
        $this->brand = $item->brand;
        $this->stock = $item->stock;
        $this->cost = $item->cost;
        $this->price = $item->price;
        $this->profit = $item->profit;
        $this->description = $item->description;
    }

    public function store()
    {
        $this->validate();
        Item::create($this->all());
    }

    public function update()
    {
        $this->validate();
        $this->item->update($this->all());
    }

    public function save()
    {
        if ($this->item->id) {
            $this->update();
        } else {
            $this->store();
        }
    }


    public function calculateProfit()
    {
        if ($this->cost && $this->price) {
            $this->profit = number_format(($this->price - $this->cost) / $this->cost * 100, 2);
            if ($this->profit < 0) {
                return $this->addError('profit', 'El precio no puede ser menor al costo');
            }
        }
    }

    public function calculatePrice()
    {
        if ($this->profit) {
            $this->price = number_format($this->cost * (1 + $this->profit / 100), 2);
        }
    }
}
