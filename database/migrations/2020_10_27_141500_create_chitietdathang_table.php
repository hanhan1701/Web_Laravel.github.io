<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdathangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdathang', function (Blueprint $table) {
            $table->bigInteger('dh_id')->unsigned();
            $table->bigInteger('sp_id')->unsigned();
            $table->integer('ctdh_giatien');
            $table->integer('ctdh_soluong');
            $table->primary(['dh_id','sp_id']);
            $table->foreign('dh_id')->references('dh_id')->on('dathang')->onDelete('cascade');
            $table->foreign('sp_id')->references('sp_id')->on('sanpham')->onDelete('cascade');
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
        Schema::dropIfExists('chitietdathang');
    }
}
