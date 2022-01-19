<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_fields', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_id')
                  ->unsigned();
            $table->foreign('form_id')
                  ->references('id')
                  ->on('forms')
                  ->onDelete('cascade');
            $table->enum('type', [
                    'text',         // ['required', 'nullable', 'max:size', 'min:size']
                    'textarea',     // ['required', 'nullable', 'max:size', 'min:size']
                    'email',        // ['required', 'nullable', 'email']
                    'url',          // ['required', 'nullable', 'url']
                    'select',       // ['required', 'nullable', 'boolean', 'numeric', 'integer', 'string']
                    'multiselect',  // ['required', 'nullable', 'array', 'min:size', 'max:size']
                    'file',         // ['required', 'nullable', 'mimetypes:foo,bar', 'mimes:foo,bar', 'min:size', 'max:size']
                    'math',         // ['required', 'nullable']
                    'time',         // ['required', 'nullable', 'date', 'date_format', 'after_time']
                    'date',         // ['required', 'nullable', 'date', 'date_format', 'after_time']
                    'datetime',     // ['required', 'nullable', 'date', 'date_format', 'after_time']
                    'datetime-local'// ['required', 'nullable', 'date', 'date_format', 'after_time']
                ]);
            $table->json('validation_rules')
                  ->nullable();
            $table->enum('scoring_policy', [
                    'disabled',
                    'default',
                    'field_type'
                ])->default('disabled');
            $table->float('score', 8, 2)
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
        Schema::dropIfExists('form_fields');
    }
}
