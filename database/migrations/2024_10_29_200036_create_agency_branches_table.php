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
        Schema::create('agency_branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agency_id')->references('id')->on('agencies')->cascadeOnDelete();
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('phone');
            $table->string('car_status');
            $table->string('work_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agency_branches');
    }
};
