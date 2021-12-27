<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->date('submission_started_at')->nullable();
            $table->date('submission_finished_at')->nullable();
            $table->date('verification_started_at')->nullable();
            $table->date('verification_finished_at')->nullable();
            $table->date('approvement_started_at')->nullable();
            $table->date('approvement_finished_at')->nullable();
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
        Schema::dropIfExists('ratings');
    }
}
