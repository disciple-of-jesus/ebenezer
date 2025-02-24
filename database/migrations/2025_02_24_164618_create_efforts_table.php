<?php

use App\Models\Effort;
use App\Models\Work;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('efforts', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('summaryOfEffort');
            $table->timestamp(Effort::CREATED_AT);
            $table->timestamp(Effort::UPDATED_AT);
            $table->foreignIdFor(Work::class);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('efforts');
    }
};
