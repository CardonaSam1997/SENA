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
        Schema::table('apply_tasks', function (Blueprint $table) {            
            $table->string('delivery_file')->nullable();            
            $table->boolean('paid')->default(false);
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('paid_at')->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apply_tasks', function (Blueprint $table) {

            $table->dropColumn([
                'delivery_file',
                'delivered_at',
                'paid',
                'paid_at'
            ]);
        });
    }
};
