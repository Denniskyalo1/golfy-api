<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('club_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Woods, Hybrids, etc
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        DB::table('club_categories')->insert([
            ['name' => 'Woods',   'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hybrids', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Irons',   'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wedges',  'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Putter',  'sort_order' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('club_categories');
    }
};
