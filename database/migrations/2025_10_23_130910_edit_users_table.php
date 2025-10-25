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
            $table->string('login','64')->nullable(false)->unique()->after('name');
            $table->string('phone','20')->nullable()->after('login');
            $table->decimal('rating', 3, 2)->nullable()->default(5.00)->after('phone');
            $table->timestamp('last_active_at')->nullable()->after('remember_token');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('login');
            $table->dropColumn('phone');
            $table->dropColumn('rating');
            $table->dropColumn('last_active_at');
        });
    }
};
