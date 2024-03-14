<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Item;

class ItemTable extends DataTableComponent
{
    protected $model = Item::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')->setTableRowUrl(function ($row) {
            return route('items.show', $row);
        });
        $this->setSecondaryHeaderEnabled();


        $this->setDefaultSort('name', 'asc');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Categoria", "category.name")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable()->searchable(),
            Column::make("Marca", "brand")
                ->sortable()->searchable(),
            Column::make("Stock", "stock")
                ->sortable(),
            Column::make("Costo", "cost")
                ->sortable(),
            Column::make("Precio", "price")
                ->sortable(),
            Column::make("Descripcion", "description")
                ->sortable()
        ];
    }
}
