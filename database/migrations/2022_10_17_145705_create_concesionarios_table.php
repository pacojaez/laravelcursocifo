<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('concesionarios', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique();
            $table->string('adress', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->bigInteger('visitas')->default(0)->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }
};

