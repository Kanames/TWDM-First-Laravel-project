<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranzactiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranzacties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('isDebitare')->nullable();   // Luam din cont sau din portofel
            $table->boolean('isCreditare')->nullable();  // Adaugam in cont sau in portofel
            $table->integer('suma')->nullable();
            $table->string('categorieTranzactie')->nullable();
            $table->string('sursaMonetara')->nullable();
            $table->string('motivTranzactie')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tranzacties');
    }
}
