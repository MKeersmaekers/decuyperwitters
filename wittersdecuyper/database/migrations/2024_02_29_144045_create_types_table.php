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
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('types')->insert(
            [
                [
                    'category_id' => '1',
                    'name' => 'Rundvee',
                    'description' => 'MIJTEN en ROOSENS van enkelvoudige granen tot mengelingen',
                    'created_at' => now()
                ],
                [
                    'category_id' => '1',
                    'name' => 'Paarden',
                    'description' => 'MIJTEN en ROOSENS van enkelvoudige granen tot mengelingen',
                    'created_at' => now()
                ],
                [
                    'category_id' => '1',
                    'name' => 'Kleine hoefdieren',
                    'description' => 'MIJTEN en ROOSENS korrels of mengelingen voor schapen - geiten - reeën - struisvogels - enz. 
                    Korrels en meel voor mestvarkens en hobbyvarkens, hangbuikzwijnen, ...',
                    'created_at' => now()
                ],
                [
                    'category_id' => '1',
                    'name' => 'Stalstrooisel',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'category_id' => '1',
                    'name' => 'Neerhofdieren',
                    'description' => 'Kippen, kalkoenen, eenden, struisvogels, ...',
                    'created_at' => now()
                ],
                [
                    'category_id' => '1',
                    'name' => 'Honden en katten',
                    'description' => 'Honden- en kattenbrokken, verschillende toebehoren en dieren hokken van eigen fabricatie.',
                    'created_at' => now()
                ],
                [
                    'category_id' => '1',
                    'name' => 'Duiven',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'category_id' => '1',
                    'name' => 'Vogels',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'category_id' => '2',
                    'name' => 'Meststoffen',
                    'description' => 'Wij bieden u in onze winkel een ruim aanbod organische en minerale meststoffen aan.
                    Meer info omtrent deze meststoffen vindt u op onderstaande links: www.fertigreen.eu en www.viano.be ',
                    'created_at' => now()
                ],
                [
                    'category_id' => '2',
                    'name' => 'Potgrond',
                    'description' => 'Wij beschikken steeds over een ruim aanbod potgronden, zaai- en stekgrond, bodemverbeteraars en turf.',
                    'created_at' => now()
                ],
                [
                    'category_id' => '2',
                    'name' => 'Boomschors',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'category_id' => '2',
                    'name' => 'Graszaden',
                    'description' => 'Bij ons zijn er verschillende soorten graszaad verkrijgbaar, het wordt voor u uitgewogen in de gewenste hoeveelheid
                    naargelang de grootte van uw te zaaien oppervlakte.',
                    'created_at' => now()
                ],
                [
                    'category_id' => '2',
                    'name' => 'Sproeistoffen',
                    'description' => 'Wij zijn verdeler van het volledige gamma sproeistoffen van het merk Edialux.',
                    'created_at' => now()
                ],
                [
                    'category_id' => '2',
                    'name' => 'Tuingereedschap',
                    'description' => 'Een ruim assortiment van tuingereedschap.',
                    'created_at' => now()
                ],
                [
                    'category_id' => '2',
                    'name' => 'Zaden en planten',
                    'description' => 'Wij bieden u het hele jaar door zaaizaad, in het voorjaar en tijdens het zaai- en plantseizoen pootgoed',
                    'created_at' => now()
                ],
                [
                    'category_id' => '2',
                    'name' => "Laarzen en jollys",
                    'description' => 'In onze winkel kan u ook kiezen uit een assortiment van laarzen en jollys. 
                    Deze zijn in verschillende maten verkrijgbaar en het is steeds mogelijk om te passen bij ons in de winkel.',
                    'created_at' => now()
                ],
                [
                    'category_id' => '2',
                    'name' => 'Weide afsluiting',
                    'description' => 'Sinds kort volgen wij het volledige gamma met weide afsluiting van Champion Watching.
                    Dit is de enige Belgische fabrikant van elektrische omheiningen en intelligente bescherming. Champion Watching biedt een zeer degelijk gamma
                    van afsluitingen met een optimale prijs - kwaliteit verhouding!',
                    'created_at' => now()
                ],
                [
                    'category_id' => '2',
                    'name' => 'Antargaz',
                    'description' => 'Sinds vele jaren zijn wij officieel Antargaz verdeelpunt. Antargaz is een leverancier van gasflessen en
                    ook gas bij u in de tank thuis. Wij verdelen hiervan de gasflessen, propaangas en butaangas, in flessen van 10.5kg tot 46kg.',
                    'created_at' => now()
                ],
                [
                    'category_id' => '2',
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
        Schema::dropIfExists('types');
    }
};
