<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('approver_id')
                  ->unsigned();
            $table->foreign('approver_id')
                  ->references('id')
                  ->on('approvers')
                  ->onDelete('cascade');
            $table->bigInteger('filling_id')
                  ->unsigned();
            $table->foreign('filling_id')
                  ->references('id')
                  ->on('fillings')
                  ->onDelete('cascade');
            $table->enum('status',  ['not considered', 'approved', 'needs revision', 'corrected', 'cancelled']);
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
        Schema::dropIfExists('approvements');
    }
}
