<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCharacterStatusField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Characters', function (Blueprint $table) {
        	$table->dropColumn('accepted');
            $table->enum('status', ['accepted', 'rejected'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Characters', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->timestamp('accepted')->nullable();
        });
    }
}
