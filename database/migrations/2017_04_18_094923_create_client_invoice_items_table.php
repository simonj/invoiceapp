<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_invoice_id')->unsigned();
            $table->foreign('client_invoice_id')->references('id')->on('client_invoices')->onDelete('cascade');
            $table->string('quantity');
            $table->string('description');
            $table->string('price');
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
        Schema::dropIfExists('client_invoice_items');
    }
}
