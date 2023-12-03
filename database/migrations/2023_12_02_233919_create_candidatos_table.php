<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {

    Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('telefone', 20)->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
            
            // Add any additional columns if needed
            // $table->timestamps();  // Uncomment if you want timestamps
        });
    }
    public function down()
    {
        Schema::dropIfExists('candidatos');
    }
};
