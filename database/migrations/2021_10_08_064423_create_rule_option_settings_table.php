<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleOptionSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule_option_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rule_option_id')
                  ->unsigned();
            $table->foreign('rule_option_id')
                  ->references('id')
                  ->on('rule_options')
                  ->onDelete('cascade');
            $table->string('setting_locale')
                  ->nullable();
            $table->string('setting_type')
                  ->nullable();
            $table->string('setting_name')
                  ->nullable();
            $table->string('setting_value')
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
        Schema::dropIfExists('rule_option_settings');
    }
}
