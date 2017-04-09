<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->nullable();
            $table->unsignedInteger('level')->nullable();
            $table->integer('klass_id')->nullable();
            $table->integer('race_id')->nullable();
            $table->enum('faction', ['Horde', 'Alliance'])->nullable();
            $table->unsignedTinyInteger('gender')->nullable();
            $table->string('guild')->nullable();
            $table->timestamp('accepted')->nullable();
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
        Schema::dropIfExists('characters');
    }
}
