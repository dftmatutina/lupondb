<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbook', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name')->unique();
            $table->date('datefiled');
            $table->mediumText('complainant');
            $table->mediumText('respondent');
            $table->longText('casetitle');
            $table->unsignedSmallInteger('casenum');
            $table->enum('caselevel', ['Mediation', 'Conciliation']);
            $table->enum('disposition', ['Settled', 'Withdrawn']); 	
            $table->timestamp('updated_at')->UseCurrent();
            $table->timestamp('created_at')->UseCurrent();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logbook');
    }
}
