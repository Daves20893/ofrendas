<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->integer('year');
            $table->string('semestre', 2);
            $table->integer('creditos');
            $table->integer('calificacion');

            $table->unsignedBigInteger('creado_por')->nullable();
            $table->unsignedBigInteger('actualizado_por')->nullable();

            $table->foreign('student_id')
                    ->references('id')->on('students')
                    ->onDelete('set null')
                    ->onUpdate('cascade');

            $table->foreign('subject_id')
                    ->references('id')->on('subjects')
                    ->onDelete('set null')
                    ->onUpdate('cascade');

            $table->foreign('creado_por')
                    ->references('id')->on('users')
                    ->onDelete('set null')
                    ->onUpdate('cascade');

            $table->foreign('actualizado_por')
                    ->references('id')->on('users')
                    ->onDelete('set null')

                    ->onUpdate('cascade');

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
        Schema::dropIfExists('credits');
    }
};
