<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationProlongationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verification_prolongations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('verifier_id')
                  ->unsigned();
            $table->foreign('verifier_id')
                  ->references('id')
                  ->on('verifiers')
                  ->onDelete('cascade');
            $table->timestamp('prolongated_at');
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
        Schema::dropIfExists('verification_prolongations');
    }
}
