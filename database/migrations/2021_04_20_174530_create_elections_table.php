<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->date('application_start');
            $table->date('application_end');
            $table->date('election_start');
            $table->date('election_end');
            $table->string('election_title');
            $table->string('election_title_code');
            $table->string('election_credentials');
            $table->string('faculty');
            $table->string('department');
            $table->string('state');
            $table->index(['faculty', 'department', 'election_title_code']);

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
        Schema::dropIfExists('elections');
    }
}
