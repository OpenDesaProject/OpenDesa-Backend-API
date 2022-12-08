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
        Schema::create('data_desas', function (Blueprint $table) {
            $table->id();
            $table->string("kode_desa");
            $table->string("nama_desa");
            $table->string("website")->nullable();
            $table->double("luas_wilayah")->nullable();
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
        Schema::dropIfExists('data_desas');
    }
};
