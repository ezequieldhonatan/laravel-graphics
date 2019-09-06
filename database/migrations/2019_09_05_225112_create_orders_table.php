<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            /* DADOS DO PEDIDO
            ================================================== */
            $table->bigInteger('user_id')->unsigned()->nullable(); ## USUÁRIO QUE FEZ A COMPRA

            $table->double('total', 10, 2); ## TOTAL
            $table->string('identify', 191)->unique(); ## IDENTIFICADOR ÚNICO DO PEDIDO
            $table->string('code', 191)->unique(); ## CÓDIGO DO PEDIDO: REF123
            $table->enum('status', ['1', '2', '3', '4', '5', '6', '7', '8', '9']); ## STATUS DO PAGAMENTO
            $table->enum('payment_method', ['1', '2', '3', '4', '5', '6', '7']); ## MÉTODOS DE PAGAMENTO
            $table->date('date'); ## DATA QUE FOI REALIZADO O PEDIDO

            ## USUÁRIO QUE FEZ A COMPRA
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('orders');
    }
}
