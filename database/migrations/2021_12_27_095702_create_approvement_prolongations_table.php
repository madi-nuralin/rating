<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovementProlongationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvement_prolongations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('approver_id')
                  ->unsigned();
            $table->foreign('approver_id')
                  ->references('id')
                  ->on('approvers')
                  ->onDelete('cascade');
            $table->date('prolongated_at');
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
        Schema::dropIfExists('approvement_prolongations');
    }
}
