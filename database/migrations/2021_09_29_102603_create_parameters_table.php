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
            $table->bigInteger('form_id')
                  ->unsigned();
            $table->foreign('form_id')
                  ->references('id')
                  ->on('forms')
                  ->onDelete('cascade');
            $table->bigInteger('category_id')
                  ->unsigned();
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
            $table->bigInteger('score')
                  ->default(0);
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
