<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * This table holds the participants who won elections by gunnering the most number of votes
 */

class CreateLeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('participant_id');
            $table->bigInteger('election_id');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaders');
    }
}
