<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {

        Schema::create('user_vagas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vagas_id');
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vagas_id')->references('id')->on('vagas')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('user_vagas');
    }
};
