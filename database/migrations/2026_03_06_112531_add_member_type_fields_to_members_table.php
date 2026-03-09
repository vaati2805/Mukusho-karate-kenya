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
        Schema::table('members', function (Blueprint $table) {
            $table->enum('member_type', ['kid', 'adult'])->default('adult')->after('id');
            $table->string('school')->nullable()->after('program');
            $table->string('location')->nullable()->after('school');
            $table->string('club')->nullable()->after('location');
            $table->string('guardian_name')->nullable()->after('emergency_phone');
            $table->string('guardian_phone')->nullable()->after('guardian_name');
            $table->string('relationship')->nullable()->after('guardian_phone');
            $table->unsignedBigInteger('group_id')->nullable()->after('relationship');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn([
                'member_type', 'school', 'location', 'club',
                'guardian_name', 'guardian_phone', 'relationship', 'group_id'
            ]);
        });
    }
};
