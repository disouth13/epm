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
        Schema::create('psdcs', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->nullable();
            $table->string('area');
            $table->string('pic');
            $table->string('nmAlat');
            $table->string('suhu');
            $table->string('kondisi');
            $table->text('keterangan');
            $table->string('photo');
            $table->date('periode');
            
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
        Schema::dropIfExists('psdcs');
    }
};
