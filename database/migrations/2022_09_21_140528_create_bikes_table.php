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
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('modelo', 255);
            $table->string('marca', 255);
            $table->integer('kms')->default(0);
            $table->integer('precio')->default(0);
            $table->string('color');
            $table->string('caballos');
            $table->string('matricula')->nullable();
            $table->date('anyo')->nullable();
            $table->boolean('matriculada')->default(false);
            $table->uuid('uuid')->nullable();
            $table->timestamps();
            // $table->time('deleted_at')->nullable()->default(NULL);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bikes');
    }
};
