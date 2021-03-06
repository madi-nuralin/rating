<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verification_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('context')
                  ->unique();
            $table->enum('color', ['green', 'yellow', 'black', 'white', 'blue', 'indigo', 'gray', 'red', 'orange']);
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
        Schema::dropIfExists('verification_statuses');
    }
}
