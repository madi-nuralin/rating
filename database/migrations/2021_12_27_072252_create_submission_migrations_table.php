<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionMigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submission_migrations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('src_id')
                  ->unsigned();
            $table->foreign('src_id')
                  ->references('id')
                  ->on('submissions')
                  ->onDelete('cascade');
            $table->bigInteger('dst_id')
                  ->unsigned();
            $table->foreign('dst_id')
                  ->references('id')
                  ->on('submissions')
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
        Schema::dropIfExists('submission_migrations');
    }
}
