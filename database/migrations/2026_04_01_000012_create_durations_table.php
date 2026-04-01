<?php

use App\Enums\DurationUnit;
use App\Models\MembershipType;
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
        Schema::create('durations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MembershipType::class)->constrained()->onDelete('restrict');
            $table->string('name');  // "Semanal", "Mensual", ...
            $table->unsignedSmallInteger('amount');  // 1, 2, 3, ...
            $table->enum('unit', DurationUnit::values());  // day, week, month
            $table->integer('price', unsigned: true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('durations');
    }
};
