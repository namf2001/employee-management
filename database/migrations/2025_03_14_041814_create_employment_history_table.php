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
        Schema::create('employment_history', function (Blueprint $table) {
            $table->id('history_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('previous_company');
            $table->string('position');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('responsibilities');
            $table->string('reference_contact')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')
                ->references('employee_id')
                ->on('employees')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment_history');
    }
};
