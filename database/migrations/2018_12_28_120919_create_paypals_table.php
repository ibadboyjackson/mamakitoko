<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaypalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastName');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('payer_id');
            $table->string('country_code')->nullable();
            $table->string('city');
            $table->string('postal_code');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('state')->nullable();
            $table->string('amount');
            $table->longText('items');
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
        Schema::dropIfExists('paypals');
    }
}
