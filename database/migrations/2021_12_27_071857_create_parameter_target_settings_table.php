<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameterTargetSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter_target_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parameter_target_id')
                  ->unsigned();
            $table->foreign('parameter_target_id')
                  ->references('id')
                  ->on('parameter_targets')
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
        Schema::dropIfExists('parameter_target_settings');
    }
}
