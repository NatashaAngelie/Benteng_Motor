<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembukuan', function (Blueprint $table) {
            $table->id();
            $table->integer('total_harga'); 
            $table->string('pesan'); 
            $table->string('kategori');  
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembukuan');
    }
};
