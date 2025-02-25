<?php

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
        Schema::create('mortgages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('is_active')->default(false);
            $table->string('description')->nullable();
            $table->integer('percent')->unsigned();
            $table->integer('min_first_payment')->unsigned();
            $table->float('max_price');
            $table->float('min_price');
            $table->integer('min_term');
            $table->integer('max_term');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mortgages');
    }
};
