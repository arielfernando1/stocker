<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Models\Item;
use App\Models\SaleDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('items/index', [
            'items' => Item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        $item = Item::find($item->id);
        $sales = SaleDetail::all();
        return view('items/show', [
            'item' => $item,
            'sales' => $sales,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item = Item::find($item->id);
        Item::destroy($item->id);
        return redirect()->route('items.index');
    }

    public function exportPdf()
    {
        // items that stock is not null ordered by name
        $items = Item::whereNotNull('stock')->orderBy('name')->get();
        $pdf =Pdf::loadView('items/pdf', compact('items'));
        return $pdf->download('items.pdf');
    }
}
