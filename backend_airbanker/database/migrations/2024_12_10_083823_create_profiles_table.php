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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id(); // Chiave primaria
            $table->unsignedBigInteger('user_id'); // Relazione con la tabella users
            $table->string('first_name'); // Nome
            $table->string('last_name'); // Cognome
            $table->string('phone')->nullable(); // Numero di telefono
            $table->date('birthdate')->nullable(); // Data di nascita
            $table->string('address')->nullable(); // Indirizzo
            $table->string('city')->nullable(); // Città
            $table->string('country')->nullable(); // Paese
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
