<?php

use App\Models\StoneOfRemembrance;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stones_of_remembrance', function (Blueprint $table) {
            $table->timestamp(StoneOfRemembrance::CREATED_AT)->nullable();
            $table->timestamp(StoneOfRemembrance::UPDATED_AT)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('stones_of_remembrance', function (Blueprint $table) {
            $table->dropColumn(StoneOfRemembrance::UPDATED_AT);
            $table->dropColumn(StoneOfRemembrance::CREATED_AT);
        });
    }
};
