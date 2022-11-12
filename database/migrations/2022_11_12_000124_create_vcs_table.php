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
        Schema::create('vcs', function (Blueprint $table) {
            $table->id();

            $table->integer('users_id')->nullable();
            $table->string('area');
            $table->string('pic');
            $table->string('merek');
            $table->string('kondisiPerangkat');
            $table->string('kondisiRemote');
            $table->string('kualitasSuara');
            $table->string('kualitasVideo');
            $table->text('keterangan');
            $table->string('photoDocumentasi');
            $table->string('photoPerangkat');
            $table->string('photoRemote');
            $table->string('photoSpesifikasi');
            $table->date('tglPengecekan');
            $table->date('periode');
            $table->string('status');

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
        Schema::dropIfExists('vcs');
    }
};
