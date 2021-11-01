<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityFormFieldValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_form_field_value', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('activity_id')
                  ->unsigned();
            $table->foreign('activity_id')
                  ->references('id')
                  ->on('activities')
                  ->onDelete('cascade');
            $table->bigInteger('form_field_value_id')
                  ->unsigned();
            $table->foreign('form_field_value_id')
                  ->references('id')
                  ->on('form_field_values')
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
        Schema::dropIfExists('activity_form_field_value');
    }
}
