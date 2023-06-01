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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            $table->string('cedula',25)->unique();
            $table->string('name',45);
            $table->boolean('activo');
            $table->string('slug',45);
            $table->unsignedBigInteger('creado_por')->nullable();
            $table->unsignedBigInteger('actualizado_por')->nullable();

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
        Schema::dropIfExists('teachers');
    }
};
