<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->string('keluar_id')->primary()->unique();
            $table->string('model_id');
            $table->foreign('model_id')->references('model_id')->on('category_stocks');
            $table->string('location_id');
            $table->foreign('location_id')->references('location_id')->on('locations');
            $table->string('Processor');
            $table->string('RAM');
            $table->string('GPU');
            $table->string('Storage');
            $table->string('OS');
            $table->string('License');
            $table->string('Monitor');
            $table->string('Keyboard');
            $table->string('Mouse');
            $table->integer('stok')->default('0');
            $table->string('SN'); #
            $table->string('keterangan');
            $table->string('gambar1');
            $table->string('gambar2');
            $table->string('assigned_user');
            $table->boolean('is_pc')->default(false);
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
        Schema::dropIfExists('barang_keluar');
    }
}
