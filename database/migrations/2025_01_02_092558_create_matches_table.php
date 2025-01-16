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
        Schema::create('matches', function (Blueprint $table) {
          
            $table->id();

            $table->string('date');
            $table->string('home_team');
            $table->string('away_team');

            $table->string('home_logo');
            $table->string('away_logo');

            $table->string('home_score');
            $table->string('away_score');

        

            $table->string('home_result');
            $table->string('away_result');



  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
