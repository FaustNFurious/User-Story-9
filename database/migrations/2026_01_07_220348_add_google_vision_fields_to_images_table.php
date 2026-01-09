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
        Schema::table('images', function (Blueprint $table) {
            $table->text('labels')->nullable();         // Storing as text to accommodate multiple labels
            $table->string('adult')->nullable();        // Storing as string for single inappropriate label (adult content)
            $table->string('spoof')->nullable();        // Storing as string for single inappropriate label (spoof content)
            $table->string('medical')->nullable();      // Storing as string for single inappropriate label (medical content)
            $table->string('violence')->nullable();     // Storing as string for single inappropriate label (violence content)
            $table->string('racy')->nullable();         // Storing as string for single inappropriate label (racy content)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn(['labels', 'adult', 'spoof', 'medical', 'violence', 'racy']);
        });
    }
};
