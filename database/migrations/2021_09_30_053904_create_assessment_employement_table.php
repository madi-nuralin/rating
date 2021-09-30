<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentEmployementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_employement', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessment_id')
                  ->unsigned();
            $table->foreign('assessment_id')
                  ->references('id')
                  ->on('assessments')
                  ->onDelete('cascade');
            $table->bigInteger('employement_id')
                  ->unsigned();
            $table->foreign('employement_id')
                  ->references('id')
                  ->on('employements')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('assessment_employement');
    }
}
