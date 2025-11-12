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
        // Issue 1 Fix: Use Schema::table() to modify an existing table.
        Schema::table('users', function (Blueprint $table) {

            // Issue 2 Fix: Columns must be defined before adding foreign keys.
            // Using 'unsignedBigInteger' is standard for foreign keys.
            // They are set to 'nullable' to support 'onDelete('set null')'.
            $table->unsignedBigInteger('role_id')->nullable()->after('nis/nip');
            $table->unsignedBigInteger('kelas_id')->nullable()->after('role_id');

            // Now we can define the foreign key constraints.
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     * This drops the foreign key constraints and the columns.
     */
    public function down(): void
    {
        // Issue 3 Fix: The down method must reverse the up method changes.
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign keys first (always drop keys before dropping the columns)
            $table->dropForeign(['role_id']);
            $table->dropForeign(['kelas_id']);

            // Then drop the columns
            $table->dropColumn('role_id');
            $table->dropColumn('kelas_id');
        });
    }
};
