<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objets', function (Blueprint $table) {
            $table->id();
            $table->string('categorie_id')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('place')->nullable(false);
            $table->string('date_found');
            $table->string('date_lost');
            $table->string('images_url')->nullable();
            $table->boolean('was_found')->default(0);
            $table->string('finder_contact')->nullable();
            $table->boolean('was_lost')->default(0);
            $table->string('losign_contact')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objets');
    }
};
