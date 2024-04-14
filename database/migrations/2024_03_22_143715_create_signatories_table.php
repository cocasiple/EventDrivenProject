<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignatoriesTable extends Migration
{
    public function up()
    {
        Schema::create('signatories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employees_id');
            $table->unsignedBigInteger('highersuperior_id');
             $table->string('status');
            $table->timestamps();
    
            $table->foreign('employees_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('highersuperior_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('signatories');
    }
}
