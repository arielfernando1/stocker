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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 100);
            $table->string('address', 100);
            $table->string('phone', 100)->unique()->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->string('ruc', 100)->unique()->nullable();
            $table->string('logo', 100)->nullable();
            $table->string('web', 100)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
