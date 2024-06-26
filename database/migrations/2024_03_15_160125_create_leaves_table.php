<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('employees_id');
            $table->date('start_leave');
            $table->date('end_leave');
            $table->string('leave_type');
            $table->string('status');
        });
    }
};
