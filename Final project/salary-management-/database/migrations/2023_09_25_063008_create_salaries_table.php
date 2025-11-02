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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->decimal('basic_salary', 10, 2);
            $table->string('allowances_description');
            $table->decimal('allowances_amount', 10, 2);
            $table->string('deductions_description');
            $table->decimal('deductions_amount', 10, 2);
            $table->decimal('net_salary', 10, 2);
            $table->string('payment_status')->default("not initiated");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
