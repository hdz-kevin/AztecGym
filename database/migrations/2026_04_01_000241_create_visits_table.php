<?php

use App\Models\Member;
use App\Models\VisitType;
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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(VisitType::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(Member::class)->nullable()->constrained()->onDelete('set null');
            $table->string('visitor_name')->nullable(); // Not a member
            $table->dateTime('visit_at');
            $table->integer('price_paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
