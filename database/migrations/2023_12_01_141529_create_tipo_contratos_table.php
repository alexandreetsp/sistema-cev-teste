<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tipo_contratos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

          // Insert specific values
          DB::table('tipo_contratos')->insert([
            ['name' => 'CLT'],
            ['name' => 'Pessoa Jurídica'],
            ['name' => 'Freelancer'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('tipo_contratos');
    }
};
