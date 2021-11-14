<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFieldVariableValueSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_field_variable_value_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_field_variable_value_id')
                  ->unsigned();
            $table->foreign('form_field_variable_value_id', 'form_field_variable_value_settings_foreign_id')
                  ->references('id')
                  ->on('form_field_variable_values')
                  ->onDelete('cascade');
            $table->string('setting_locale')
                  ->nullable();
            $table->string('setting_type')
                  ->nullable();
            $table->string('setting_name')
                  ->nullable();
            $table->string('setting_value', 2048)
                  ->nullable();
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
        Schema::dropIfExists('form_field_variable_value_settings');
    }
}
