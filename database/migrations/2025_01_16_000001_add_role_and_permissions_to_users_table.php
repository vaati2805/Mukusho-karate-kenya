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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('viewer')->after('password');
            // role values: super_admin, admin, editor, viewer
            $table->string('status')->default('pending')->after('role');
            // status values: approved, pending, rejected
            $table->json('permissions')->nullable()->after('status');
            // permissions: {"members": {"view": true, "edit": false}, "payments": {"view": true, "edit": false}, "content": {"view": false, "edit": false}, "users": {"view": false, "edit": false}}
            $table->string('phone')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'status', 'permissions', 'phone']);
        });
    }
};
