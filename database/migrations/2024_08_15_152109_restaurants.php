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
        //
        Schema::create('restaurants',function(Blueprint $table){
            $table->id();
            $table->integer('master_restaurant_brand_id');
            $table->string('address');
            $table->integer('master_city_state_id');
            $table->float('rating');
            $table->integer('deal_amount');
            $table->string('deal_options');
            $table->integer('bought_count');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('restaurants');
    }
};
