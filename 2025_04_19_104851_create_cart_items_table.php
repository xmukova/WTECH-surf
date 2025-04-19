<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // primárny kľúč
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Referencia na používateľa (ak je prihlásený)
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Referencia na produkt
            $table->string('size'); // Veľkosť produktu (ak je to relevantné)
            $table->integer('quantity'); // Množstvo produktu
            $table->timestamps(); // Časové pečiatky (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
