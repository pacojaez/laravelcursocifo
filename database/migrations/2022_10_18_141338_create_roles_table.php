<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role', 255);
            $table->string('description', 255);
            $table->timestamps();
        });

        Schema::create('role_user', function (Blueprint $table) {
            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreignId('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);
        });
    }
};
