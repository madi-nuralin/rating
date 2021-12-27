<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifiers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')
                  ->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->bigInteger('rating_id')
                  ->unsigned();
            $table->foreign('rating_id')
                  ->references('id')
                  ->on('ratings')
                  ->onDelete('cascade');
            $table->bigInteger('parameter_target_id')
                  ->unsigned();
            $table->foreign('parameter_target_id')
                  ->references('id')
                  ->on('parameter_targets')
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
        Schema::dropIfExists('verifiers');
    }
}
