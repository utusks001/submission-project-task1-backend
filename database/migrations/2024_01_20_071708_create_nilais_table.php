<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->unique((['id_siswa', 'id_mapel']));    
            $table->integer('nilaiLs1');
            $table->integer('nilaiLs2');    
            $table->Integer('nilaiLs3');
            $table->Integer('nilaiLs4');
            $table->Integer('nilaiUh1');
            $table->Integer('nilaiUh2');
            $table->Integer('nilaiUts');
            $table->Integer('nilaiUs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
