<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
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
            $table->title('name');
            $table->text('description')->nullable();
            $table->decimal('price',12,2)->unsigned()->default(0);
            $table->decimal('discount_percentage',12,2)->unsigned()->default(0);
            $table->decimal('rating',12,2)->unsigned()->default(0);
            $table->int('stock')->unsigned()->default(0);
            $table->string('brand');
            $table->string('category');
            $table->string('thumbnail');
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
}
