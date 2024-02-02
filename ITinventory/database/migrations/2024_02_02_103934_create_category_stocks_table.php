<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_stocks', function (Blueprint $table) {
            $table->string('model_id')->primary()->unique();
            $table->string('model_name');
            $table->string('category_id');
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->integer('stok')->default('0');
            $table->string('gambar');
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
        Schema::dropIfExists('category_stocks');
    }
}
