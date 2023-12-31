<?php

namespace App\Livewire;

use App\Livewire\Forms\ItemForm;
use App\Models\Category;
use App\Models\Item;
use Livewire\Component;


class EditItemForm extends Component
{
    public ItemForm $form;
    public Item $item;
    public $categories;
    public function render()
    {
        return view('livewire.edit-item-form');
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->form->is_service = $this->item->is_service;
        $this->form->category_id = $this->item->category_id;
        $this->form->name = $this->item->name;
        $this->form->brand = $this->item->brand;
        $this->form->stock = $this->item->stock;
        $this->form->cost = $this->item->cost;
        $this->form->price = $this->item->price;
        $this->form->description = $this->item->description;
    }

    public function save()
    {
        Item::find($this->item->id)->update($this->form->all());
        session()->flash('success', 'Item actualizado correctamente');
    }

    public function delete()
    {
        try {
            Item::find($this->item->id)->delete();
            return redirect()->route('items.index');
        } catch (\Throwable $th) {
            if ($th->getCode() == 23000) {
                session()->flash('error', 'No se puede eliminar el item porque tiene registros asociados');
            } else {
                session()->flash('error', 'No se puede eliminar el item');
            }
        }
    }
}
