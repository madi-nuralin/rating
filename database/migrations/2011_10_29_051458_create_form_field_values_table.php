<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFieldValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_field_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_field_id')
                  ->unsigned();
            $table->foreign('form_field_id')
                  ->references('id')
                  ->on('form_fields')
                  ->onDelete('cascade');
            $table->string('file_path', 2048)
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
        Schema::dropIfExists('form_field_values');
    }
}
