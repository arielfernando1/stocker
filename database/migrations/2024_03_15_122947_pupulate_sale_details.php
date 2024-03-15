<?php

use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $sales = Sale::all();
        foreach ($sales as $sale) {
            $saleDetail = new SaleDetail();
            $saleDetail->sale_id = $sale->id;
            $saleDetail->item_id = $sale->item_id;
            $saleDetail->quantity = $sale->quantity;
            $saleDetail->total = $sale->total;
            $saleDetail->save();
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
