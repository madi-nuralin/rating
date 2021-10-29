<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentConfirmerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_confirmer', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessment_id')
                  ->unsigned();
            $table->foreign('assessment_id')
                  ->references('id')
                  ->on('assessments')
                  ->onDelete('cascade');
            $table->bigInteger('confirmer_id')
                  ->unsigned();
            $table->foreign('confirmer_id')
                  ->references('id')
                  ->on('confirmers')
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
        Schema::dropIfExists('assessment_confirmer');
    }
}
