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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('taxes_id')->nullable()->change();
            $table->unsignedBigInteger('categories_id')->nullable()->constrained('categories')
            ->onDelete('cascade')->change(); 
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_coulmn', function (Blueprint $table) {
            //
        });
    }
};
