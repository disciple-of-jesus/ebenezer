<?php

use App\CurrentState;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('works', function (Blueprint $table) {
            $table->enum(column: 'currentState', allowed: [CurrentState::TO_DO->value, CurrentState::DOING->value, CurrentState::DONE->value])
                ->default(CurrentState::TO_DO);
        });
    }

    public function down(): void
    {
        Schema::table('works', function (Blueprint $table) {
            $table->dropColumn('currentState');
        });
    }
};
