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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->string('nombre',45);
            $table->string('provincia',45);
            $table->string('ciudad',45);
            $table->string('barrio',45);
            $table->boolean('salvo');
            $table->boolean('bautizado');
            $table->unsignedBigInteger('lesson_id')->nullable();
            $table->string('slug',45);
            $table->unsignedBigInteger('creado_por')->nullable();
            $table->unsignedBigInteger('actualizado_por')->nullable();

            $table->foreign('lesson_id')
                    ->references('id')->on('lessons')
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
        Schema::dropIfExists('visitors');
    }
};
