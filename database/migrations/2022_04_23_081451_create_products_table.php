<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->integer('price');
            $table->integer('price_old')->default(1);
            $table->text('description');
            $table->string('origin', 250);
            $table->string('insurance', 250);
            $table->integer('quantity');
            $table->string('video', 50);
            $table->foreignId('manufacturer_id')->constrained('manufacturers');
            $table->foreignId('subtype_id')->constrained('subtypes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
