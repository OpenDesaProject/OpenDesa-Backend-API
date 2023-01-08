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
        Schema::create('profil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id')->constrained('kecamatan')->cascadeOnDelete();
            $table->string('alamat')->nullable();
            $table->longText('visi')->nullable();
            $table->longText('misi')->nullable();
            $table->string('logo')->nullable();
            $table->string('bagan_struktur')->nullable();
            $table->string('photo_camat')->nullable();
            $table->string('camat')->nullable();
            $table->string('sekretaris')->nullable();
            $table->string('kepsek_pemerintahan_umum')->nullable();
            $table->string('kepsek_kesejahteraan_masyarakat')->nullable();
            $table->string('kepsek_pemberdayaan_masyarakat')->nullable();
            $table->string('kepsek_pelayanan_umum')->nullable();
            $table->string('kepsek_trantib')->nullable();
            $table->longText('sambutan_camat')->nullable();
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
        Schema::dropIfExists('profil');
    }
};
