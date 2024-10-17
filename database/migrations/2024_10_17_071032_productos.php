<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('productos', function (Blueprint $table) {

            $table->engine = "InnoDB";

            $table->bigIncrements('id');
            $table->string('nombre');
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('marca_id')->unsigned();
            $table->bigInteger('unidad_id')->unsigned();
            $table->decimal('precioCompra', 8, 2);
            $table->decimal('precioVenta', 8, 2);
            $table->bigInteger('estado');

            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete("cascade");
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete("cascade");
            $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
