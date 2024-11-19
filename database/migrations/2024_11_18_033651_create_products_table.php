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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            //$table->decimal('price', 10, 2);
            $table->double('price', 8, 2);//digit, decimal
            $table->string('image');
            $table->integer('quantity')->unsigned();// positive integer //signed() is default and can be negative integer // https://www.ibm.com/docs/en/aix/7.2?topic=types-signed-unsigned-integers
            $table->string('categoryID');//->constrained()->onDelete('cascade');//categoryID is the column name in the products table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
