<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('fighter_links', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('fighter_id')->constrained(table: 'fighters', indexName: 'fighter_links_fighters_id');
            $table->string('tapology_url')->nullable();
            $table->text('cagematch_url')->nullable();
            $table->text('ufc_url')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fighter_links');
    }
};
