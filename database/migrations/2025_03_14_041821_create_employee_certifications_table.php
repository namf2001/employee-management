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
        Schema::create('employee_certifications', function (Blueprint $table) {
            $table->id('emp_cert_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('certification_id');
            $table->date('date_obtained');
            $table->date('expiry_date');
            $table->string('certificate_number');
            $table->timestamps();

            $table->foreign('employee_id')
                ->references('employee_id')
                ->on('employees')
                ->onDelete('cascade');
            $table->foreign('certification_id')
                ->references('certification_id')
                ->on('certifications')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_certifications');
    }
};
