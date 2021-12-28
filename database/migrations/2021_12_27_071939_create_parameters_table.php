<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parameter_target_id')
                  ->unsigned();
            $table->foreign('parameter_target_id')
                  ->references('id')
                  ->on('parameter_targets')
                  ->onDelete('cascade');
            $table->bigInteger('score')
                  ->nullable();
            $table->bigInteger('form_id')
                  ->unsigned();
            $table->foreign('form_id')
                  ->references('id')
                  ->on('forms')
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
        Schema::dropIfExists('parameters');
    }
}
