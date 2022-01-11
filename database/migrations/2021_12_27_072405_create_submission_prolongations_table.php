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
            $table->bigInteger('rating_id')
                  ->unsigned();
            $table->foreign('rating_id')
                  ->references('id')
                  ->on('ratings')
                  ->onDelete('cascade');
            $table->bigInteger('user_id')
                  ->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->timestamp('prolongated_at');
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
