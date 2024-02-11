<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use Livewire\Form;

class ItemForm extends Form
{
    public Item $item;
    public $category_id;
    public $name;
    public $brand;
    public $stock;
    public $cost;
    public $price;
    public $profit = 30;
    public $description;

    public function rules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required|string|max:255|min:3',
            'price' => 'required',
        ];
    }

    protected $messages = [
        'category_id.required' => 'La categoría es requerida',
        'name.required' => 'El nombre es requerido',
        'price.required' => 'El precio es requerido',
    ];

    public function setItem(Item $item)
    {
        $this->item = $item;
        // $this->is_service = $item->is_service;
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
