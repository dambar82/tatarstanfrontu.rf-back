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
        Schema::table('competition_works', function (Blueprint $table) {
            $table->string('place')->after('file')->nullable();
            $table->renameColumn('educational_institution', 'organization');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('competition_works', function (Blueprint $table) {
            $table->dropColumn('place');
            $table->renameColumn('organization', 'educational_institution');
        });
    }
};
