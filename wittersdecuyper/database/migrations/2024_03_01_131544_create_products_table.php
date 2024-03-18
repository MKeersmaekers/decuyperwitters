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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subtype_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('products')->insert(
            [
                [
                    'subtype_id' => '1',
                    'name' => 'Melkpoeder',
                    'description' => 'Nukamel Bleu',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '1',
                    'name' => 'Vivo start',
                    'description' => 'van 0 – 10 weken, naast zuiver water en hooi, 20kg
                    smakelijke aanvulling van noodzakelijke vitaminen en mineralen',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '1',
                    'name' => 'Vivo groei',
                    'description' => ' van 10 – 20 weken naast zuiver water, 20 kg smakelijke complete mix die meermaals gevoederd wordt, geeft zo meer rendement',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '1',
                    'name' => 'Jongveemix 18',
                    'description' => 'te voederen naast eiwitrijk kuilvoer, 25kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '1',
                    'name' => 'Beefmix 26',
                    'description' => 'voor een perfecte groei door een hoog eiwitgehalte, 25kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '1',
                    'name' => 'Beefmash 18 afmest',
                    'description' => ' te voederen naast zetmeelrijke kuilmais of aardappelen, 25kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '1',
                    'name' => 'Bietenhulp',
                    'description' => '25kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '2',
                    'name' => 'Witte zoutlikstenen',
                    'description' => '10kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '2',
                    'name' => 'Rode mineraallikstenen',
                    'description' => '10kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '3',
                    'name' => 'Gerste mix',
                    'description' => 'een mengeling voor jonge tot volwassen paarden met gerst, 20kg geschikt voor zenuwachtige paarden met een hevig temperament',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '3',
                    'name' => 'Paarden – Diner',
                    'description' => 'een mengeling voor jonge tot volwassen met geplette witte haver en alle vitaminen en mineralen, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '3',
                    'name' => 'Sport mix super',
                    'description' => 'een energetische mengeling rijk aan zwarte haver, vitaminen en aminozuren, 20kg voor sportpaarden',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '3',
                    'name' => 'Herba mix',
                    'description' => 'een mengeling met kruiden voor alle paarden met een zuiverende werking op lucht en bloedwegen, bevorderd de eetlust en de darmflora en beïnvloedt het uithoudingsvermogen, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '3',
                    'name' => 'Quattro',
                    'description' => 'een sobere eiwitarme mengeling met kruidenhooi voor quarters – fjorden – ijslanders – haflingers, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '3',
                    'name' => 'Veulenmengeling',
                    'description' => 'mengeling voor hoog drachtige merries en veulens tot 12 maanden, 20kg bevat melkproducten voor een optimale groei en speenbaarheid',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '3',
                    'name' => 'Nova mix',
                    'description' => 'een volledig uitgebalanceerde mengeling voor eczeemgevoelige paarden, 20kg
                    Werkt zeer goed tegen schuren',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '3',
                    'name' => 'Kruidenslobber',
                    'description' => 'een mengeling die gegeven word na zware inspanningen of ziekte voor een snel herstel, 15kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '3',
                    'name' => 'Opti – form',
                    'description' => 'een mengeling van geselecteerde grassen, kruiden en levende gist bacteriën, 15kg aan te raden bij: oudere paarden – vermagerde paarden – paarden met darmproblemen',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '4',
                    'name' => 'Onderhoudsvlokken',
                    'description' => 'mengeling zonder haver met de nodige vitaminen en mineralen zonder veel energie te verstrekken, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '4',
                    'name' => 'Onderhoudskorrel',
                    'description' => 'enkelvoudige korrel met de nodige vitaminen en mineralen, 25kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '4',
                    'name' => 'Appelmuesli',
                    'description' => 'een betere recreatiemengeling met appelpulp en met een zeer aangenaam aroma, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '4',
                    'name' => 'Lucerne mix',
                    'description' => 'een mengeling van vers gehakselde lucerne en groen geoogste snijhaver. Deze combinatie staat garant voor langzaam vrijkomde energie ter ondersteuning van het uithoudingsvermogen, zonder dat het paard heet of nerveus wordt.',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '5',
                    'name' => 'Gerstevlokken',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '5',
                    'name' => 'Maisvlokken',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '5',
                    'name' => 'Spelt',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '5',
                    'name' => 'Bietenpulp',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '5',
                    'name' => 'Witte geplette haver',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '5',
                    'name' => 'Zwarte geplette haver',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '6',
                    'name' => 'Lijnzaadkorrels',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '6',
                    'name' => 'Lijnzaadolie',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '6',
                    'name' => 'Knoflook',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '6',
                    'name' => 'Zeewier',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '6',
                    'name' => 'Vita mineralen',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '6',
                    'name' => 'Hoef optimal',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '6',
                    'name' => 'E-plus',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '6',
                    'name' => 'MSM',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '6',
                    'name' => 'MSM glucosamine',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '6',
                    'name' => 'Box free',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '6',
                    'name' => 'Paardensnoepjes mijten',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '7',
                    'name' => 'Schapenkorrel',
                    'description' => 'geperste korrel, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '7',
                    'name' => 'Schapen herten reeën
                    en geitenvlokken',
                    'description' => 'samenstelling van verschillende vlokken, 20kg',
                    'created_at' => now()
                ],

                [
                    'subtype_id' => '7',
                    'name' => 'Schapen en lammerenmix',
                    'description' => 'zeer smakelijke mengeling met de nodige mineralen en vitaminen, 15kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '7',
                    'name' => 'Geiten en hertenmix',
                    'description' => 'smakelijke muesli voor een goede gezondheid en vitaliteit van uw dieren, 15kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '7',
                    'name' => 'Loperskorrel',
                    'description' => 'volledig diervoer voor varkens vanaf 35kg, 25kg verpakking',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '7',
                    'name' => 'Lopersmeel',
                    'description' => 'volledig diervoer voor varkens vanaf 35kg, 25kg verpakking',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '7',
                    'name' => 'Hobbymix voor varkens',
                    'description' => 'aanvullende muesli voor hobbyvarkens, 20kg verpakking',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '8',
                    'name' => 'Witte zoutlikstenen',
                    'description' => '10kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '8',
                    'name' => 'Rode mineraallikstenen',
                    'description' => '10kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '9',
                    'name' => 'Houtvezel',
                    'description' => '
                    Zuivere en kiemvrije houtvezel van Qeen – span
                    Verpakt in een plastic verpakking.
                    Optimaal stofvrij
                    Bijzonder goed absorberend
                    Verkrijgbaar bij ons per pak of per pallet.
                ',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '9',
                    'name' => 'Vlas',
                    'description' => '100% biologische structuur
                    Neemt 12x meer vocht op dan stro
                    Vlas composteert tot 75%
                    Kan optimaal gebruikt worden als bodembedekking in uw tuin
                    Gebruik: 1 baal voor 2m² vb: box 3x3 = 4 balen. Daarna wekelijks ½ baal bijstrooien
                    Verpakt in een plastic verpakking, ongeveer 20kg
                    Verkrijgbaar bij ons per pak of per pallet.',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '9',
                    'name' => 'Koolzaadstro',
                    'description' => '100% zuiver gehakseld koolzaadstro
                    Volledig stofvrij
                    Gaat veel langer mee dan gewoon tarwestro
                    Heeft een vochtabsorptie van 250%
                    Gebruik: 5 balen bij aanvang per box. Daarna wekelijks ½ bijstrooien
                    Verpakt in een plastic verpakking, ong 20kg
                    Bij ons verkrijgbaar per pak of per pallet.',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '9',
                    'name' => 'Aubiose',
                    'description' => '100% natuurlijk product afkomstig van de hennestengel
                    Zeer geschikt voor paarden met ademhalingsproblemen
                    1 baal per 2m² en lichtjes besprenkelen met water met een kleine hoeveelheid azijn of javel toegevoegd
                    Verpakt in een plastic verpakking.
                    Bij ons verkrijgbaar per pak.',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '10',
                    'name' => 'Poeljengraan',
                    'description' => 'mengeling met gebroken mais, 5kg en 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '10',
                    'name' => 'Hennengraan',
                    'description' => 'mengeling met hele mais, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '10',
                    'name' => 'Graanmix',
                    'description' => 'mengeling met gebroken mais en legkorrels, 5kg en 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '10',
                    'name' => 'Legkorrel',
                    'description' => 'aanvullend diervoer voor legpluimvee, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '10',
                    'name' => 'Legmeel',
                    'description' => 'legmix, gemalen granen met extra rode mais voor een rode dooier, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '10',
                    'name' => 'Kuikenmeel',
                    'description' => 'start tot 8 weken, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '10',
                    'name' => 'Vleeskuikenmeel',
                    'description' => '+ 8 weken, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '10',
                    'name' => 'Kalkoenmeel',
                    'description' => 'start van 0-6 weken, groei + 7 weken, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '10',
                    'name' => 'Kalkoenkorrel',
                    'description' => 'start van 0-6 weken, groei + 7 weken, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '10',
                    'name' => 'Eendenkorrel',
                    'description' => 'duck 3 pellet, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '10',
                    'name' => 'Struisvogelkorrel',
                    'description' => 'te voederen vanaf 4 maanden, voor onderhoud en afmest, 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '11',
                    'name' => 'Hondenbrokken',
                    'description' => 'verschillende merken in verschillende verpakkingen van 4kg – 5kg en grote zakken van 15kg.',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '11',
                    'name' => 'Kattenbrokken',
                    'description' => 'Zeer smakelijke kattenbrokjes in verpakkingen van 5kg en 15kg.',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '11',
                    'name' => 'Toebehoren',
                    'description' => 'verschillende toebehoren verkrijgbaar zoals speeltjes, kattenbakvulling, enz.',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '11',
                    'name' => 'Dierenhokken',
                    'description' => 'Eigen fabricatie van dieren hokken: Hondenslaaphokken, kippenhokken, konijnenhokken, ook op maat gemaakt.',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '12',
                    'name' => 'Beduco',
                    'description' => 'Is een van onze leveranciers van duivenvoeders en de bijhorende supplementen',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '12',
                    'name' => 'Beyers',
                    'description' => 'Zij bieden U en ons zeer hoge kwaliteitsmengelingen aan betaalbare prijzen voor sport- en sierduiven. Ook mengelingen speciaal aangepast aan de sport- kweek- en ruiperiode!',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '12',
                    'name' => 'Van Tilburg',
                    'description' => 'Hiervan volgen wij een heel gamma met o.a. kweek- sport en ruimengelingen en ook diverse supplementen.',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '13',
                    'name' => 'Beduco - Deli Nature',
                    'description' => 'Wij verkopen de zeer alom hoge kwaliteitszaden van Deli Nature, zowel enkelvoudige als Deli Nature als samengestelde mengelingen

                    Ook hebben wij onze eigen samengestelde mengelingen voor wilde- en natuurvogels
                    Verpakt in zakken van 1kg - 2.5kg - 5kg en volledige zakken van 15kg tot 20kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '14',
                    'name' => 'Schelpenzand',
                    'description' => 'Wit en bruin van Ostrea.',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '14',
                    'name' => 'Eivoeders',
                    'description' => 'Verschillende soorten in grote en kleine verpakkingen',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '14',
                    'name' => 'Toebehoren',
                    'description' => 'Alle soorten eetbakjes en drinkflessen, nestmateriaal,...',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '15',
                    'name' => 'Koemest',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '15',
                    'name' => 'Kalk',
                    'description' => 'magnesiumkalk en zeewierkalk en kalkcyanamide',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '15',
                    'name' => 'Samengestelde tuinmeststof 9 - 7 - 14',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '15',
                    'name' => 'Patentkali',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '16',
                    'name' => 'Kalk',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '16',
                    'name' => 'Kalkcyanamide',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '16',
                    'name' => 'Stikstof 27 + 4',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '16',
                    'name' => 'Samengestelde weidemeststof 15 - 4 - 15',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '16',
                    'name' => 'Speciale samengestelde weidemeststof voor de paardenweide 8 – 6 – 14 ',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '17',
                    'name' => 'Universele potgrond',
                    'description' => ' zakken van 45L en 70L, ook verkrijgbaar in Big Bag van 1m³ en los op bestelling.',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '17',
                    'name' => 'Zaai- en stekgrond',
                    'description' => 'Zakken van 70L',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '17',
                    'name' => 'Turf',
                    'description' => 'verpakkingen van 150L en 250L',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '19',
                    'name' => 'Gazonzaad',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '19',
                    'name' => 'Graszaad voor blijvende weiden',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '19',
                    'name' => 'Verschillende soorten raaigras (op bestelling)',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '20',
                    'name' => 'Bestrijdingsmiddelen',
                    'description' => 'voor ratten/muizen',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '20',
                    'name' => 'Onkruidbestrijdingsmiddelen',
                    'description' => 'voor in de tuin, gazon en op het erf',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '20',
                    'name' => 'Insecticiden ',
                    'description' => 'voor het bestrijden van allerlei insecten zowel in de tuin al in huis',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '20',
                    'name' => 'Birchmeier sproeitoestellen',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '21',
                    'name' => 'Schoppen, rieken, gaffels, ...',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '21',
                    'name' => 'Snoeigerief',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '21',
                    'name' => 'Gieters, waterslangen, ...',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '21',
                    'name' => 'Kruiwagens',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '22',
                    'name' => 'Zaaizaad van groenten, bloemen, ...',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '22',
                    'name' => 'Plantaardappelen',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '22',
                    'name' => 'Plantajuin en plantsjalot',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '22',
                    'name' => 'Bonen en erwten',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '22',
                    'name' => 'Verschillende groentenplantjes',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '23',
                    'name' => 'Classic modellen',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '23',
                    'name' => 'Fashion modellen',
                    'description' => '',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '23',
                    'name' => 'Inlegzolen',
                    'description' => 'Inlegzolen voor de jollys die apart verkrijgbaar zijn, per maat.',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '24',
                    'name' => 'Afspanning weiden',
                    'description' => 'Paarden, schapen, geiten of veeweiden',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '24',
                    'name' => 'Eetbakken en drinkbakken',
                    'description' => 'Met automatische vlotters',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '24',
                    'name' => 'Elektrische apparaten',
                    'description' => 'Voor stroomvoorziening op een draad, lint of koord rond uw weide',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '24',
                    'name' => 'Groene geïmpregneerde palen',
                    'description' => 'Voor het gebruik in de tuin, weide of in een perkje',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '24',
                    'name' => 'Zwarte geïmpregneerde palen',
                    'description' => 'voor een uiterst lange levensduur bij het gebruik in de weide',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '25',
                    'name' => 'Propaangas',
                    'description' => '10.5 - 46kg',
                    'created_at' => now()
                ],
                [
                    'subtype_id' => '25',
                    'name' => 'Butaangas',
                    'description' => '10.5 - 46kg',
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
        Schema::dropIfExists('products');
    }
};
