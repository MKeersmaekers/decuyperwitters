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
        Schema::create('subtypes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('subtypes')->insert(
            [
                [
                    'type_id' => '1',
                    'name' => 'Krachtvoeders',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '1',
                    'name' => 'Supplementen',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '2',
                    'name' => 'Krachtvoeders mijten',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '2',
                    'name' => 'Krachtvoeders Roosens',
                    'description' => 'Verschillende andere mengelingen van Roosens ook verkrijgbaar op bestelling!',
                    'created_at' => now()
                ],
                [
                    'type_id' => '2',
                    'name' => 'Enkelvoudige paardenvoeders',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '2',
                    'name' => 'Bijproducten paardenvoeders',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '3',
                    'name' => 'Krachtvoeders',
                    'description' => 'Bij al deze krachtvoeders dient steeds vers water gegeven te worden.',
                    'created_at' => now()
                ],
                [
                    'type_id' => '3',
                    'name' => 'Supplementen',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '4',
                    'name' => 'Stalstrooisels',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '5',
                    'name' => 'Voeders',
                    'description' => 'Enkelvoudige voeder zoals: gebroken mais, hele mais, tarwe, ... zijn steeds per 5 - 10 of 20kg verkrijgbaar in de winkel.
                    Extra: Oesterschelpen, extra kalk voor de sterkte van de schelp van de eieren, 1 - 2.5 - 5 of 20kg.',
                    'created_at' => now()
                ],
                [
                    'type_id' => '6',
                    'name' => 'Honden en kattenvoeders',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '7',
                    'name' => 'Duivenvoeders',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '8',
                    'name' => 'Beduco - Deli Nature',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '8',
                    'name' => 'Bijproducten en toebehoren voor vogels',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '9',
                    'name' => 'Tuinmeststoffen',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '9',
                    'name' => 'Weidemeststoffen',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '10',
                    'name' => 'Potgrond',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '11',
                    'name' => 'Boomschors',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '12',
                    'name' => 'Graszaden',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '13',
                    'name' => 'Sproeistoffen',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '14',
                    'name' => 'Tuingereedschap',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '15',
                    'name' => 'Zaden en planten',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '16',
                    'name' => "Laarzen en jolly's",
                    'description' => 'Alle jollys zijn ook verkrijgbaar in een open of gesloten model achteraan.
                    Ook hebben wij inlegzolen voor de jollys die apart verkrijgbaar zijn, per maat.',
                    'created_at' => now()
                ],
                [
                    'type_id' => '17',
                    'name' => 'Weide afsluiting',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '18',
                    'name' => 'Antargaz verdeelpunt',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'type_id' => '19',
                    'name' => 'Houtpellets',
                    'description' => '',
                    'created_at' => now()
                ],
            ]
        );


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subtypes');
    }
};
