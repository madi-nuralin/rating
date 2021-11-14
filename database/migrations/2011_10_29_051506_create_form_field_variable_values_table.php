<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFieldVariableValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_field_variable_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_field_variable_id')
                  ->unsigned();
            $table->foreign('form_field_variable_id')
                  ->references('id')
                  ->on('form_field_variables')
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
        Schema::dropIfExists('form_field_variable_values');
    }
}
