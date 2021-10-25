<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentConfirmerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_confirmer', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assignment_id')
                  ->unsigned();
            $table->foreign('assignment_id')
                  ->references('id')
                  ->on('assignments')
                  ->onDelete('cascade');
            $table->bigInteger('confirmer_id')
                  ->unsigned();
            $table->foreign('confirmer_id')
                  ->references('id')
                  ->on('confirmers')
                  ->onDelete('cascade');
            $table->bigInteger('status')
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
        Schema::dropIfExists('assignment_confirmer');
    }
}
