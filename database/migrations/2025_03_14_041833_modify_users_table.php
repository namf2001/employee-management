<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add new columns to existing users table
            $table->unsignedBigInteger('employee_id')->nullable()->after('id');
            $table->boolean('is_locked')->default(false)->after('remember_token');
            $table->integer('failed_attempts')->default(0)->after('is_locked');
            $table->timestamp('last_login')->nullable()->after('failed_attempts');

            // Add foreign key constraint
            $table->foreign('employee_id')
                ->references('employee_id')
                ->on('employees')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropColumn(['employee_id', 'is_locked', 'failed_attempts', 'last_login']);
        });
    }
};
