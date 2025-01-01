<?php

use App\Models\Space;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stones_of_remembrance', function (Blueprint $table) {
            $table->id();
            $table->string('nameOfStone');
            $table->string('wayOfShowing');
            $table->text('contextToWord');
            $table->foreignIdFor(Space::class);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stones_of_remembrance');
    }
};
