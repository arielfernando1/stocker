<?php

namespace App\Livewire;

use App\Models\Category;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

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
    public function filters(): array
    {
        return [
            SelectFilter::make('Tipo')
                ->options([
                    '' => 'Todos',
                    '1' => 'Producto',
                    '2' => 'Servicio'
                ])->filter(
                    function (Builder $builder, string $value) {
                        if ($value == '') {
                            return $builder;
                        } else if ($value == '1') {
                            return $builder->whereNotNull('stock');
                        } else if ($value == '2') {
                            return $builder->whereNull('stock');
                        }
                    }
                ),
            SelectFilter::make('Categoria')
                ->options(
                    Category::pluck('name', 'id')->toArray()
                )
                ->filter(
                    function (Builder $builder, $value) {
                        return $builder->where('category_id', $value);
                    }
                ),
            // no inventory filter (stock = 0)
            SelectFilter::make('Stock')
                ->options([
                    '' => 'Todos',
                    '1' => 'Con Stock',
                    '2' => 'Sin Stock'
                ])->filter(
                    function (Builder $builder, string $value) {
                        if ($value == '') {
                            return $builder;
                        } else if ($value == '1') {
                            return $builder->where('stock', '>', 0);
                        } else if ($value == '2') {
                            return $builder->where('stock', 0);
                        }
                    }
                )
        ];
    }
}
