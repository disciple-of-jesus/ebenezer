<?php

use App\Models\Work;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nameOfWork');
            $table->timestamp(Work::CREATED_AT);
            $table->timestamp(Work::UPDATED_AT);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
