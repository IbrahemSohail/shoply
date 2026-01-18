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
            $table->renameColumn('categories_id', 'category_id');
            $table->renameColumn('taxes_id', 'tax_id');
            $table->renameColumn('colors', 'color_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('category_id', 'categories_id');
            $table->renameColumn('tax_id', 'taxes_id');
            $table->renameColumn('color_id', 'colors');
        });
    }
};
