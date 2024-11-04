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
        Schema::create('advertisments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('c_title');
            $table->string('c_years');
            $table->string('c_brand');
            $table->string('c_model');
            $table->string('c_style')->comment('نمط السيارة');
            $table->double('c_price',10,2);
            $table->string('c_trans')->comment('ناقل الحركة');
            $table->string('c_place')->comment('country');
            $table->string('c_stats')->comment('city');
            $table->string('c_km');
            $table->string('c_fuel');
            $table->string('c_type');
            $table->string('c_color');
            $table->string('c_phone');
            $table->string('c_email');
            $table->string('c_comfort');
            $table->string('c_windows');
            $table->string('c_sound');
            $table->string('c_safety');
            $table->string('c_other');
            $table->text('more_info')->nullable();
            $table->text('c_images');
            $table->string('adv_status');
            $table->string('adv_plan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisments');
    }
};
