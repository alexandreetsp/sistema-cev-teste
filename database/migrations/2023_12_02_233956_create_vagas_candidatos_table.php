<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vagas_candidatos', function (Blueprint $table) {
            $table->unsignedBigInteger('vaga_id');
            $table->unsignedBigInteger('candidato_id');
            $table->primary(['vaga_id', 'candidato_id']);
            
            $table->foreign('vaga_id')->references('id')->on('vagas')->onDelete('cascade');
            $table->foreign('candidato_id')->references('id')->on('candidatos')->onDelete('cascade');
            $table->timestamps();
            
            // Add any additional columns if needed
            // $table->timestamps();  // Uncomment if you want timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('vagas_candidatos');
    }
};
