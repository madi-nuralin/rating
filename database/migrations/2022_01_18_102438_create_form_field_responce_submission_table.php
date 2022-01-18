<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFieldResponceSubmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_field_responce_submission', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_field_responce_id')
                  ->unsigned();
            $table->foreign('form_field_responce_id')
                  ->references('id')
                  ->on('form_field_responces')
                  ->onDelete('cascade');
            $table->bigInteger('submission_id')
                  ->unsigned();
            $table->foreign('submission_id')
                  ->references('id')
                  ->on('submissions')
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
        Schema::dropIfExists('form_field_responce_submission');
    }
}
