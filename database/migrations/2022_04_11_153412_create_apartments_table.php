<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete("cascade");
            $table->string('title');
            $table->string('slug')->unique();
            $table->tinyInteger('num_guest');
            $table->tinyInteger('num_rooms');
            $table->tinyInteger('num_beds');
            $table->tinyInteger('num_bath');
            $table->float('price', 6, 2);
            $table->integer('square_footage');
            $table->string('preview')->nullable();
            $table->boolean('visible');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('apartments');
    }
}
