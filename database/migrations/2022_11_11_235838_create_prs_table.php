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
        Schema::create('prs', function (Blueprint $table) {
            $table->id();

            $table->integer('users_id')->nullable();
            $table->string('area');
            $table->string('pic');
            $table->string('photoBefore');
            $table->string('photoAfter');
            $table->text('keterangan');
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
        Schema::dropIfExists('prs');
    }
};
