<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rating_id')
                  ->unsigned();
            $table->foreign('rating_id')
                  ->references('id')
                  ->on('ratings')
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
        Schema::dropIfExists('rating_settings');
    }
}
