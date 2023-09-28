<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ItemForm extends Form
{
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
    public $description;
    // define messages
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
}
