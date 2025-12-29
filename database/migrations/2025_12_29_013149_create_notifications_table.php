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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type'); 
            // apply_created, apply_approved, task_closed, etc.
            $table->morphs('notifiable'); 
            // Empresa o Profesional (receptor)
            $table->json('data')->nullable(); 
            // id_tarea, id_profesional, mensaje, etc.
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }
   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
