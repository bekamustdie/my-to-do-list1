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
        Schema::table('tasks', function (Blueprint $table) {
            if (!Schema::hasColumn('tasks', 'id')) {
                $table->id();
            }
            if (!Schema::hasColumn('tasks', 'title')) {
                $table->string("title");
            }
            if (!Schema::hasColumn('tasks', 'deadline')) {
                $table->date("deadline")->default(null);
            }
            if (!Schema::hasColumn('tasks', 'priority')) {
                $table->enum("priority",['low',"medium", 'high'])->default("medium");
            }
            if (!Schema::hasColumn('tasks', 'completed')) {
                $table->boolean("completed")->default(false);
            }
            if (!Schema::hasColumn('tasks', 'created_at')) {
                $table->timestamps();
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
