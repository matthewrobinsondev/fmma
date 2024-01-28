<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fighter_nicknames', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('fighter_id')->constrained(
                table: 'fighters',
                indexName: 'fighter_nicknames_fighters_id'
            );
            $table->string('nickname');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fighter_nicknames');
    }
};
