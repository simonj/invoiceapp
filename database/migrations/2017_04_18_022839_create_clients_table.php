<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (blueprint $table) {
            $table->increments('id');
            $table->string('company');
            $table->string('email');
            $table->string('address1');
            $table->string('address2')->nullable();;
            $table->string('city');
            $table->string('state')->nullable();;
            $table->string('zipcode');
            $table->string('country');
            $table->string('contact_person');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::drop('clients');
    }
}
