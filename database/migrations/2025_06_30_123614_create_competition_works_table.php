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
        Schema::create('competition_works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->string('fio_participant');
            $table->string('age')->nullable();
            $table->string('city');
            $table->integer('district_id')->nullable();
            $table->text('educational_institution')->nullable();
            $table->string('fio_curator')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_works');
    }
};
