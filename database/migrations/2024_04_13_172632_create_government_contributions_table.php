<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovernmentContributionsTable extends Migration
{
    public function up()
    {
        Schema::create('government_contributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employees_id');
            $table->decimal('sss_contribution', 8, 2);
            $table->decimal('pagibig_contribution', 8, 2);
            $table->decimal('philhealth_contribution', 8, 2);
            $table->string('tin_number');
            $table->timestamps();
       

            $table->foreign('employees_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('government_contributions');
    }
}