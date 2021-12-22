<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employement_type_id')
                  ->unsigned();
            $table->foreign('employement_type_id')
                  ->references('id')
                  ->on('employement_types')
                  ->onDelete('cascade');
            $table->bigInteger('department_id')
                  ->unsigned();
            $table->foreign('department_id')
                  ->references('id')
                  ->on('departments')
                  ->onDelete('cascade');
            $table->bigInteger('position_id')
                  ->unsigned();
            $table->foreign('position_id')
                  ->references('id')
                  ->on('positions')
                  ->onDelete('cascade');
            $table->bigInteger('user_id')
                  ->unsigned();
            $table->foreign('user_id')
                  ->references('id' )
                  ->on('users')
                  ->onDelete('cascade');
            $table->date('appointed_at')
                  ->nullable(false);
            $table->date('terminated_at')
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
        Schema::dropIfExists('employements');
    }
}
