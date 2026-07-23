<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  

public function up()
{
    // Check if the 'image' column does NOT exist before adding it
    if (!Schema::hasColumn('products', 'image')) {
        Schema::table('products', function (Blueprint $table) {
            $table->string('image')->nullable(); // Your column definition here
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
