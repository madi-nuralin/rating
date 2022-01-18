<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_parameter', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parameter_id')
                  ->unsigned();
            $table->foreign('parameter_id')
                  ->references('id')
                  ->on('parameters')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('form_parameter');
    }
}
