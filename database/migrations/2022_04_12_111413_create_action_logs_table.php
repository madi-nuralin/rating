<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')
                  ->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->enum('table_name', [
                'forms',
                'form_fields',
                'form_field_options',
                'form_field_responces',
                'users',
                'roles',
                'department_types',
                'departments',
                'positions',
                'employement_types',
                'employements',
                'ratings',
                'rating_user',
                'parameter_targets',
                'parameters',
                'submissions',
                'submission_migrations',
                'verifiers',
                'verification_statuses',
                'verifications',
                'form_parameter',
                'form_field_responce_submission'
            ]);
            $table->bigInteger('table_primary_key_id')
                  ->unsigned()
                  ->nullable();
            $table->enum('action', [
                'create',
                'read',
                'update',
                'delete'
            ]);
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
        Schema::dropIfExists('action_logs');
    }
}
