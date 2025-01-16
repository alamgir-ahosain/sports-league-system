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
        Schema::create('playerinfos', function (Blueprint $table) {
            $table->id();

               
            $table->string('name');
            $table->string('position');
            $table->string('dob');
            $table->string('nationality');
            $table->string('profileimage');
            $table->string('countryimage');
            $table->integer('team_id');
            
            $table->integer('played')->default(0);
            $table->integer('goal')->default(0);
            $table->integer('assist')->default(0);
            $table->integer('yellow')->default(0);
            $table->integer('red')->default(0);


            
          



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playerinfos');
    }
};
