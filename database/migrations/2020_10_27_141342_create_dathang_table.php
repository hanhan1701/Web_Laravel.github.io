<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDathangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dathang', function (Blueprint $table) {
            $table->bigIncrements('dh_id');
            $table->string('dh_tongtien',150);
            $table->string('dh_nguoinhan',150);
            $table->string('dh_sdt',150);
            $table->string('dh_diachi',250);
            $table->string('dh_trangthai',150);
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
        Schema::dropIfExists('dathang');
    }
}
