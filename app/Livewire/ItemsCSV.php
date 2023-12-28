<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class ItemsCSV extends ModalComponent
{
    use WithFileUploads;
    public $file;
    public $rowCount;
    public $header;

    public function render()
    {
        return view('livewire.items-c-s-v');
    }

    public function save()
    {
        try {
            $this->validate([
                'file' => 'required|file|mimes:csv,txt'
            ]);
            $file = fopen($this->file->getRealPath(), 'r');
            $header = fgetcsv($file);
            // dd($header);
            while ($row = fgetcsv($file)) {
                $item = array_combine($header, $row);
                Item::create([
                    'category_id' => $item['category_id'],
                    'name' => $item['name'],
                    'brand' => $item['brand'],
                    'stock' => $item['stock'],
                    'cost' => $item['cost'],
                    'price' => $item['price'],
                    'description' => $item['description'],
                ]);
            }
            $this->closeModal();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    // public function fileChoosen($file)
    // {
    //     $this->file = $file;
    //     $this->rowCount = count(file($file->getRealPath()));
    //     $this->header = $this->getHeaderRow();
    // }
}
