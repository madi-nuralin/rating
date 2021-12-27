<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionProlongationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submission_prolongations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('submission_id')
                  ->unsigned();
            $table->foreign('submission_id')
                  ->references('id')
                  ->on('submissions')
                  ->onDelete('cascade');
            $table->date('prolongated_at');
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
        Schema::dropIfExists('submission_prolongations');
    }
}
