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
        Schema::create('apply_tasks', function (Blueprint $table) {
            $table->id();
            $table->primary(['id_profesionales', 'id_tareas']);
            $table->foreignId('id_professional')->constrained('professionals')->onDelete('cascade');
            $table->foreignId('id_task')->constrained('task')->onDelete('cascade');
            $table->boolean('authorization')->default(false);
            $table->text('suggestion')->nullable();
            $table->integer('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_tasks');
    }
};
