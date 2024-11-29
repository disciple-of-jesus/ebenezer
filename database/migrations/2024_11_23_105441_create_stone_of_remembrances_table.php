<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stone_of_remembrances', function (Blueprint $table) {
            $table->id();
            $table->string('nameOfStone');
            $table->string('wayOfShowing');
            $table->text('contextToWord');
            $table->foreignIdFor(User::class);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stone_of_remembrances');
    }
};
