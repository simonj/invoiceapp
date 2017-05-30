<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_key');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')
                ->references('id')->on('client_invoices')
                ->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->dateTime('due_date');
            $table->text('status');
            $table->text('notes');
            $table->integer('amount');
            $table->boolean('paid');
            $table->boolean('has_seen_email')->default(0);
            $table->boolean('has_seen_invoice')->default(0);
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
        Schema::dropIfExists('client_invoices');
    }
}
