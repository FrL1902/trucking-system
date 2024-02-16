<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->string('barang_id');
            $table->string('barang');
            $table->string('lokasi');
            $table->string('by_user');
            $table->string('status');
            $table->string('model');
            $table->string('kategori');
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
        Schema::dropIfExists('history');
    }
}
