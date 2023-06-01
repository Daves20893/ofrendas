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
        Schema::create('offerings', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->string('slug',45);
            $table->decimal('diezmo',6,2);
            $table->decimal('ofrenda',6,2);
            $table->decimal('mision',6,2);
            $table->decimal('protemplo',6,2);
            $table->decimal('servicio',6,2);
            $table->decimal('buena_dadiva',6,2);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->decimal('monto',7,2);
            $table->decimal('total',6,2);
            $table->unsignedBigInteger('brother_id')->nullable();
            $table->unsignedBigInteger('creado_por')->nullable();
            $table->unsignedBigInteger('actualizado_por')->nullable();

            $table->foreign('brother_id')
                    ->references('id')->on('brothers')
                    ->onDelete('set null')
                    ->onUpdate('cascade');

            $table->foreign('category_id')
                    ->references('id')->on('categories')
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
        Schema::dropIfExists('offerings');
    }
};
