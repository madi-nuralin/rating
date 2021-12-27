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
            $table->bigInteger('submission_id')
                  ->unsigned();
            $table->foreign('submission_id')
                  ->references('id')
                  ->on('submissions')
                  ->onDelete('cascade');
            $table->bigInteger('verifier_id')
                  ->unsigned();
            $table->foreign('verifier_id')
                  ->references('id')
                  ->on('verifiers')
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
