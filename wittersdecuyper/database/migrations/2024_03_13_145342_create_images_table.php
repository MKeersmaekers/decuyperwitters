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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('path');
            $table->timestamps();
        });

        DB::table('images')->insert(
            [
                [
                    'type_id' => '1',
                    'path' => '/storage/images/type_images/Rundvee/mijten.jpg',
                ],
                [
                    'type_id' => '1',
                    'path' => '/storage/images/type_images/Rundvee/roosens.jpg',
                ],
                [
                    'type_id' => '1',
                    'path' => '/storage/images/type_images/Rundvee/Rundvee.jpg',
                ],
                [
                    'type_id' => '2',
                    'path' => '/storage/images/type_images/Paarden/mijten.jpg',
                ],
                [
                    'type_id' => '2',
                    'path' => '/storage/images/type_images/Paarden/Paarden_1.jpg',
                ],
                [
                    'type_id' => '2',
                    'path' => '/storage/images/type_images/Paarden/Paarden_2.jpg',
                ],
                [
                    'type_id' => '2',
                    'path' => '/storage/images/type_images/Paarden/Paarden_3.jpg',
                ],
                [
                    'type_id' => '2',
                    'path' => '/storage/images/type_images/Paarden/roosens.jpg',
                ],
                [
                    'type_id' => '3',
                    'path' => '/storage/images/type_images/Kleine hoefdieren/Kleine_hoefdieren.jpg',
                ],
                [
                    'type_id' => '3',
                    'path' => '/storage/images/type_images/Kleine hoefdieren/mijten.jpg',
                ],
                [
                    'type_id' => '3',
                    'path' => '/storage/images/type_images/Kleine hoefdieren/roosens.jpg',
                ],
                [
                    'type_id' => '4',
                    'path' => '/storage/images/type_images/Stalstrooisel/Stalstrooisel.jpg',
                ],
                [
                    'type_id' => '5',
                    'path' => '/storage/images/type_images/Neerhofdieren/roosens.jpg',
                ],
                [
                    'type_id' => '5',
                    'path' => '/storage/images/type_images/Neerhofdieren/versele.jpg',
                ],
                [
                    'type_id' => '5',
                    'path' => '/storage/images/type_images/Neerhofdieren/Neerhofdieren.jpg',
                ],
                [
                    'type_id' => '6',
                    'path' => '/storage/images/type_images/Honden en katten/lobo.jpg',
                ],
                [
                    'type_id' => '6',
                    'path' => '/storage/images/type_images/Honden en katten/bentokronen.jpg',
                ],
                [
                    'type_id' => '6',
                    'path' => '/storage/images/type_images/Honden en katten/euro_premium.jpg',
                ],
                [
                    'type_id' => '6',
                    'path' => '/storage/images/type_images/Honden en katten/Honden_en_katten_eten_1.jpg',
                ],
                [
                    'type_id' => '6',
                    'path' => '/storage/images/type_images/Honden en katten/Honden_en_katten_eten_2.jpg',
                ],
                [
                    'type_id' => '6',
                    'path' => '/storage/images/type_images/Honden en katten/Honden_en_katten_eten_3.jpg',
                ],
                [
                    'type_id' => '6',
                    'path' => '/storage/images/type_images/Honden en katten/palcofriends.jpg',
                ],
                [
                    'type_id' => '6',
                    'path' => '/storage/images/type_images/Honden en katten/roosens.jpg',
                ],
                [
                    'type_id' => '7',
                    'path' => '/storage/images/type_images/Duiven/beyers.jpg',
                ],
                [
                    'type_id' => '7',
                    'path' => '/storage/images/type_images/Duiven/mijten.jpg',
                ],
                [
                    'type_id' => '8',
                    'path' => '/storage/images/type_images/Vogels/beduco.png',
                ],
                [
                    'type_id' => '8',
                    'path' => '/storage/images/type_images/Vogels/deli_nature.jpg',
                ],
                [
                    'type_id' => '8',
                    'path' => '/storage/images/type_images/Vogels/delinature.jpg',
                ],
                [
                    'type_id' => '8',
                    'path' => '/storage/images/type_images/Vogels/Vogels_1.jpg',
                ],
                [
                    'type_id' => '8',
                    'path' => '/storage/images/type_images/Vogels/Vogels_2.jpg',
                ],
                [
                    'type_id' => '9',
                    'path' => '/storage/images/type_images/Meststoffen/fertigreen.png',
                ],
                [
                    'type_id' => '9',
                    'path' => '/storage/images/type_images/Meststoffen/Meststoffen_1.jpg',
                ],
                [
                    'type_id' => '9',
                    'path' => '/storage/images/type_images/Meststoffen/Meststoffen_2.jpg',
                ],
                [
                    'type_id' => '9',
                    'path' => '/storage/images/type_images/Meststoffen/viano.png',
                ],
                [
                    'type_id' => '10',
                    'path' => '/storage/images/type_images/Potgrond/Potgrond.jpg',
                ],
                [
                    'type_id' => '10',
                    'path' => '/storage/images/type_images/Potgrond/terrabrill.jpg',
                ],
                [
                    'type_id' => '13',
                    'path' => '/storage/images/type_images/Sproeistoffen/edialux.jpg',
                ],
                [
                    'type_id' => '13',
                    'path' => '/storage/images/type_images/Sproeistoffen/Sproeistoffen_1.jpg',
                ],
                [
                    'type_id' => '13',
                    'path' => '/storage/images/type_images/Sproeistoffen/Sproeistoffen_2.jpg',
                ],
                [
                    'type_id' => '13',
                    'path' => '/storage/images/type_images/Sproeistoffen/Sproeistoffen_3.jpg',
                ],
                [
                    'type_id' => '14',
                    'path' => '/storage/images/type_images/Tuingereedschap/Kruiwagens.jpg',
                ],
                [
                    'type_id' => '14',
                    'path' => '/storage/images/type_images/Tuingereedschap/Tuingereedschap_1.jpg',
                ],
                [
                    'type_id' => '14',
                    'path' => '/storage/images/type_images/Tuingereedschap/Tuingereedschap_2.jpg',
                ],
                [
                    'type_id' => '14',
                    'path' => '/storage/images/type_images/Tuingereedschap/Tuingereedschap_3.jpg',
                ],
                [
                    'type_id' => '15',
                    'path' => '/storage/images/type_images/Zaden en planten/planten.jpg',
                ],
                [
                    'type_id' => '15',
                    'path' => '/storage/images/type_images/Zaden en planten/Zaden_en_planten_1.jpg',
                ],
                [
                    'type_id' => '15',
                    'path' => '/storage/images/type_images/Zaden en planten/Zaden_en_Planten_2.jpg',
                ],
                [
                    'type_id' => '16',
                    'path' => '/storage/images/type_images/Laarzen en jollys/JollyenLaarzen1.jpg',
                ],
                [
                    'type_id' => '17',
                    'path' => '/storage/images/type_images/Weide afsluiting/Houten_Palen.jpg',
                ],
                [
                    'type_id' => '17',
                    'path' => '/storage/images/type_images/Weide afsluiting/weide_afsluiting_1.jpg',
                ],
                [
                    'type_id' => '17',
                    'path' => '/storage/images/type_images/Weide afsluiting/weide_afsluiting_2.jpg',
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};

