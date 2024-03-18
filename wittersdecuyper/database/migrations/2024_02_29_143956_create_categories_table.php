<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('categories')->insert(
            [
                [
                    'name' => 'Dieren',
                    'description' => 'U vindt bij de Cuyper - Witters een brede waaier aan dierenvoeding en toebehoren.
                    Alles voor katten en honden, hoefdieren, vogels,... Ontdek hier ons zeer ruim assortiment.',
                    'created_at' => now()
                ],
                [
                    'name' => 'Tuin',
                    'description' => 'De Cuyper - Witters is de specialist in materiaal voor het onderhoud van uw tuin en huis.
                    Gereedschap, meststoffen, zaden en planten, boomschors,... Bezoek onze winkel en laat u verbazen door ons aanbod aan materialen.',
                    'created_at' => now()
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
