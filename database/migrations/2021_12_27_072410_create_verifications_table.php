<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('verifier_id')
                  ->unsigned();
            $table->foreign('verifier_id')
                  ->references('id')
                  ->on('verifiers')
                  ->onDelete('cascade');
            $table->bigInteger('filling_id')
                  ->unsigned();
            $table->foreign('filling_id')
                  ->references('id')
                  ->on('fillings')
                  ->onDelete('cascade');
            $table->enum('status', ['not considered', 'verified', 'requires changes', 'corrected', 'cancelled']);
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
        Schema::dropIfExists('verifications');
    }
}
