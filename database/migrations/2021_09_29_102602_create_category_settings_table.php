<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')
                  ->unsigned();
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
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
        Schema::dropIfExists('category_settings');
    }
}
