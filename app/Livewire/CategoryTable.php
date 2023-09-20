<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination;
    public $search = '';

    #[On('categoryAdded')]
    public function render()
    {
        return view('livewire.category-table', [
            'categories' => Category::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->paginate(10)

        ]);
    }

    public function delete($id)
    {
        try {
            Category::destroy($id);
            $message = 'Category deleted successfully';
            $flashType = 'success';
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                $message = 'No puedes eliminar una categoría que tiene productos asociados';
                $flashType = 'error';
            } else {
                $message = 'Something went wrong';
                $flashType = 'error';
            }
        } finally {
            session()->flash($flashType, $message);
            return redirect()->route('categories.index');
        }
    }
}
