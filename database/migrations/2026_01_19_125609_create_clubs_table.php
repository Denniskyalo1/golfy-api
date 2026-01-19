<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::dropIfExists("golf_clubs");

        Schema::create('clubs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('club_category_id')
                ->constrained('club_categories')
                ->cascadeOnDelete();

            $table->string('name'); // e.g. "Sand Wedge (56°)"
            $table->unsignedSmallInteger('default_distance_yds');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique(['club_category_id', 'name']);
        });

        $categories = DB::table('club_categories')
            ->pluck('id', 'name');

        $now = now();

        // ---- CLUB DATA ----
        $clubs = [

            // Woods
            ['Woods', 'Driver', 230],
            ['Woods', '3 Wood', 215],
            ['Woods', '4 Wood', 200],
            ['Woods', '5 Wood', 190],
            ['Woods', '7 Wood', 175],
            ['Woods', '9 Wood', 160],

            // Hybrids
            ['Hybrids', '1 Hybrid', 210],
            ['Hybrids', '2 Hybrid', 200],
            ['Hybrids', '3 Hybrid', 190],
            ['Hybrids', '4 Hybrid', 180],
            ['Hybrids', '5 Hybrid', 170],
            ['Hybrids', '6 Hybrid', 160],
            ['Hybrids', '7 Hybrid', 150],
            ['Hybrids', '8 Hybrid', 140],
            ['Hybrids', '9 Hybrid', 130],

            // Irons
            ['Irons', '1 Iron', 200],
            ['Irons', '2 Iron', 190],
            ['Irons', '3 Iron', 180],
            ['Irons', '4 Iron', 170],
            ['Irons', '5 Iron', 160],
            ['Irons', '6 Iron', 150],
            ['Irons', '7 Iron', 140],
            ['Irons', '8 Iron', 130],
            ['Irons', '9 Iron', 120],

            // Wedges (15)
            ['Wedges', 'Pitching Wedge (44°)', 125],
            ['Wedges', 'Pitching Wedge (46°)', 120],
            ['Wedges', 'Gap Wedge (48°)', 115],
            ['Wedges', 'Gap Wedge (50°)', 110],
            ['Wedges', 'Gap Wedge (52°)', 105],
            ['Wedges', 'Sand Wedge (54°)', 100],
            ['Wedges', 'Sand Wedge (56°)', 95],
            ['Wedges', 'Sand Wedge (58°)', 90],
            ['Wedges', 'Lob Wedge (60°)', 85],
            ['Wedges', 'Lob Wedge (62°)', 80],
            ['Wedges', 'Lob Wedge (64°)', 75],
            ['Wedges', 'Lob Wedge (66°)', 70],
            ['Wedges', 'Lob Wedge (68°)', 65],
            ['Wedges', 'Lob Wedge (70°)', 60],
            ['Wedges', 'Ultra Lob Wedge (72°)', 55],

            // Putter
            ['Putter', 'Putter', 5],
        ];

        $insertData = [];
        $sort = 1;

        foreach ($clubs as [$category, $name, $distance]) {
            $insertData[] = [
                'club_category_id'   => $categories[$category],
                'name'               => $name,
                'default_distance_yds' => $distance,
                'sort_order'         => $sort++,
                'created_at'         => $now,
                'updated_at'         => $now,
            ];
        }

        DB::table('clubs')->insert($insertData);
    }

    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
