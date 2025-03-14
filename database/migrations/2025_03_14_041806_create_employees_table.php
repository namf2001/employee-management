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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->date('hire_date');
            $table->decimal('salary', 10, 2);
            $table->unsignedBigInteger('department_id'); // Define column explicitly
            $table->foreign('department_id')
                ->references('department_id')
                ->on('departments')
                ->onDelete('cascade');
            $table->unsignedBigInteger('role_id'); // Define column explicitly
            $table->foreign('role_id')
                ->references('role_id') // Assuming roles table uses default 'id'
                ->on('roles')
                ->onDelete('cascade');
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
