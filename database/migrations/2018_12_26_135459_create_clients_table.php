<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('username');
            $table->string('email');
            $table->string('adresse_1');
            $table->string('adresse_2')->nullable();
            $table->string('telephone');
            $table->bigInteger('zip');
            $table->string('pays');
            $table->string('ville');
            $table->string('charge_id');
            $table->double('montant');
            $table->longText('panier');
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
        Schema::dropIfExists('clients');
    }
}
