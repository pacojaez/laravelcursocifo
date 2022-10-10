<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ciudad', 255 )->nullable();
            $table->date('nacimiento' )->nullable();
            $table->string('provincia', 255 )->nullable();
            $table->string('telefono', 255 )->nullable();
        });
    }
};
