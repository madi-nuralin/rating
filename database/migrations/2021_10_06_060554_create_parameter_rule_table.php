<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameterRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter_rule', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parameter_id')
                  ->unsigned();
            $table->foreign('parameter_id')
                  ->references('id')
                  ->on('parameters')
                  ->onDelete('cascade');
            $table->bigInteger('rule_id')
                  ->unsigned();
            $table->foreign('rule_id')
                  ->references('id')
                  ->on('rules')
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
        Schema::dropIfExists('parameter_rule');
    }
}
