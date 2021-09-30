<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_parameter', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessment_id')
                  ->unsigned();
            $table->foreign('assessment_id')
                  ->references('id')
                  ->on('assessments')
                  ->onDelete('cascade');
            $table->bigInteger('parameter_id')
                  ->unsigned();
            $table->foreign('parameter_id')
                  ->references('id')
                  ->on('parameters')
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
        Schema::dropIfExists('assessment_parameter');
    }
}
