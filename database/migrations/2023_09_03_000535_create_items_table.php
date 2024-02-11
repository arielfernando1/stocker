<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->boolean("is_service")->default(false);
            $table->foreignId("category_id")->default(1)->constrained();
            $table->string("name", 255);
            $table->string("brand", 100)->nullable();
            $table->integer("stock")->nullable();
            $table->decimal("cost", 8, 2)->nullable();
            $table->decimal("price", 8, 2);
            $table->text("description")->nullable();
            $table->longText("image")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
