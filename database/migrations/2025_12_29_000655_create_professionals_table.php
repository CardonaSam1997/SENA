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
        Schema::create('professionals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('document', 20)->unique();
            $table->string('name', 100);
            $table->string('last_name', 100);
            $table->string('address', 255);
            $table->string('birth_date', 255)->nullable();
            $table->string('description', 255)->nullable();            
            $table->char('gender', 1)->nullable();
            $table->string('age', 3)->nullable();
            $table->integer('experience')->nullable();
            $table->string('academic_education',150)->nullable();
            $table->string('service_type', 30)->nullable();
            $table->string('document_photo', 100)->nullable();
            $table->string('curriculum', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professionals');
    }
};
