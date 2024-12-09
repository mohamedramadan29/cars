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
        Schema::create('feature_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_category')->references('id')->on('feature_main_categories')->cascadeOnDelete();
            $table->string('title');
            $table->decimal('price');
            $table->integer('days_number');
            $table->longText( 'advantagies');
            $table->longText('dis_advantagies');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_sub_categories');
    }
};
