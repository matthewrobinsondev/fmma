<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Fighters\Enums\Gender;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('fighters', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->enum('gender', Gender::toArray())->default(Gender::MALE);
            $table->string('nationality');
            $table->string('fighting_out_of');
            $table->string('affiliation')->nullable();
            $table->date('date_of_birth');
            $table->string('image_url')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fighters');
    }
};
