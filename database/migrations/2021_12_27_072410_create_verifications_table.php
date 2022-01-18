<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('verifier_id')
                  ->unsigned();
            $table->foreign('verifier_id')
                  ->references('id')
                  ->on('verifiers')
                  ->onDelete('cascade');
            $table->bigInteger('submission_id')
                  ->unsigned();
            $table->foreign('submission_id')
                  ->references('id')
                  ->on('submissions')
                  ->onDelete('cascade');
            $table->bigInteger('verification_status_id')
                  ->unsigned();
            $table->foreign('verification_status_id')
                  ->references('id')
                  ->on('verification_statuses')
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
        Schema::dropIfExists('verifications');
    }
}
