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
      Schema::create('shopping_items', function (Blueprint $table) {
        $table->id();
       // $table->foreignId('user_id')->constrained('users')->nullable();;
        $table->string('text');
        $table->boolean('high_prio');;
        $table->foreignId('category_id')->constrained('categories');;
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_items');
    }
};
