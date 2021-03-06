<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameterRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter_rating', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parameter_id')
                  ->unsigned();
            $table->foreign('parameter_id')
                  ->references('id')
                  ->on('parameters')
                  ->onDelete('cascade');
            $table->bigInteger('rating_id')
                  ->unsigned();
            $table->foreign('rating_id')
                  ->references('id')
                  ->on('ratings')
                  ->onDelete('cascade');
            $table->bigInteger('form_id')
                  ->unsigned()
                  ->nullable();           // should be removed
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
        Schema::dropIfExists('parameter_rating');
    }
}
