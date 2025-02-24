<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('works', function (Blueprint $table) {
            $table->text('nameOfWork')->change();
        });

        $databaseRows = DB::table('works')->get();

        foreach ($databaseRows as $singleRow) {
            $encryptedNameOfWork = Crypt::encryptString($singleRow->nameOfWork);

            DB::table('works')
                ->where('id', $singleRow->id)
                ->update(['nameOfWork' => $encryptedNameOfWork]);
        }
    }

    public function down(): void
    {
        $databaseRows = DB::table('works')->get();

        foreach ($databaseRows as $singleRow) {
            $decryptedNameOfWork = Crypt::decryptString($singleRow->nameOfWork);

            DB::table('works')
                ->where('id', $singleRow->id)
                ->update(['nameOfWork' => $decryptedNameOfWork]);
        }

        Schema::table('works', function (Blueprint $table) {
            $table->string('nameOfWork')->change();
        });
    }
};
