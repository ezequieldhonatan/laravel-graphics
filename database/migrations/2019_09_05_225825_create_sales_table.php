<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');

            /* DADOS DA VENDA
            ================================================== */
            $table->bigInteger('order_id')->unsigned()->nullable(); ## PEDIDO
            $table->bigInteger('product_id')->unsigned()->nullable(); ## PRODUTO

            $table->double('price', 10, 2); ## PREÇO DO PRODUTO
            $table->integer('qty'); ## QUANTIDADE DE PRODUTOS
            
            ## PEDIDO
            $table->foreign('order_id')
                    ->references('id')
                    ->on('orders')
                    ->onDelete('cascade');

            ## PRODUTO
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
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
        Schema::dropIfExists('sales');
    }
}
