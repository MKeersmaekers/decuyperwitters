<x-default-layout>

    <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style='background-image: url("https://images.pexels.com/photos/1769279/pexels-photo-1769279.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1");'>
            <span id="blackOverlay" class="w-full h-full absolute opacity-60 bg-black"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <div class="px-12">
                        <h1 class="text-white font-bold text-5xl">
                            De Cuyper Witters
                        </h1>
                        <h2 class="text-white font-bold text-3xl pt-4">
                            Alles voor dier en tuin
                        </h2>
                        <p class="mt-8 text-lg text-gray-300 font-semibold">
                            De Cuyper Witters uit Heist-op-den-Berg is de speciaalzaak waar u alles vindt voor dier en tuin.
                            U vindt bij ons alle soorten dierenvoeding en alle benodigdheden voor het onderhoud van uw tuin en huis.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pb-20 from-green-700/25 bg-green-500 -mt-24">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                                <x-healthicons-f-animal-chicken />


                            </div>
                            <h6 class="text-xl font-semibold">Dieren</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Op zoek naar de beste voeding voor jouw dier?
                                Bij ons vind je alles voor kippen, paarden en meer!
                                Van kwaliteitsvoeding tot handige benodigdheden.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">
                                <x-heroicon-s-user />

                            </div>
                            <h6 class="text-xl font-semibold">Professioneel Advies</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Laat ons u helpen met het maken van geïnformeerde keuzes.
                                Onze experts bieden op maat gesneden aanbevelingen.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full theme-bg">
                                <x-maki-garden />
                            </div>
                            <h6 class="text-xl font-semibold">Tuin</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Ontdek ons uitgebreide assortiment aan kwalitatieve producten,
                                zoals meststoffen, sproeistoffen en meer!
                                Vind precies wat u nodig heeft voor uw tuin.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="flex flex-wrap text-center justify-center">
            <div class="w-full lg:w-6/12 px-4">
                <h2 class="text-4xl font-semibold text-black">Categorieën</h2>
                <p class="text-lg leading-relaxed mt-4 mb-4 pb-8 text-grey">
                    Hier vind je een breed scala aan producten voor jouw tuin en dieren.
                    Of je nu op zoek bent naar gereedschap om je tuin te onderhouden,
                    of naar leuke speeltjes voor je hond of kat, je vindt het hier gegarandeerd!
                </p>
            </div>
        </div>
        <div class="container m-auto px-4">
            <!-- if there are only two categories: -->
            <!-- im retrieving these categories from the appserviceprovider -->
            @if ($NavbarCategories->count() == 2)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
                @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @endif
                    <!-- if more than three categories:  -->
                    @foreach ($NavbarCategories as $categorie)
                    <a href="{{ route('Categorie', ['slug' => $categorie->name]) }}" 
                    class="transform transition-transform duration-300 hover:scale-95 hover:shadow-lg relative grid h-[20rem] w-full flex-col items-end justify-center overflow-hidden rounded-xl bg-white bg-clip-border text-center text-gray-700">
                        <div class="absolute inset-0 m-0 h-full w-full overflow-hidden rounded-none bg-transparent bg-cover bg-clip-border bg-center text-gray-700 shadow-none" style="background-image: url('{{ $categorie->cover['url'] }}');">
                            <div class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-t from-black/80 via-black/50"></div>
                        </div>
                        <div class="relative p-6 px-6 md:px-12">
                            <h2 class="mb-6 font-sans text-2xl md:text-3xl lg:text-4xl font-medium leading-[1.5] tracking-normal text-white antialiased">
                                {{ $categorie->name }}
                            </h2>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

    </section>




    <section class="relative block lg:pt-0 bg-gradient-to-tr from-green-700/25 bg-green-500">
        <div class="container grid gap-6 m-auto text-center lg:grid-cols-2 py-12 items-stretch">

            <div class="container block justify-center">
                <div class="flex flex-wrap text-center justify-center">
                    <div class="w-full px-4">
                        <h2 class="text-4xl font-semibold text-white">Historiek</h2>
                        <p class="text-lg leading-relaxed mt-4 mb-4 text-white">
                            Onze zaak werd gestart door wijlen Jos en Collet Witters – Serneels in 1955.
                            Op 1 augustus 1987 namen Gilbert en Lieve De Cuyper – Witters de toen bestaande winkel over.
                            Dit is dus ondertussen de 2e generatie!
                        </p>
                    </div>
                </div>


                <div id="default-carousel" class="relative max-w-96 hidden sm:block mx-auto z-0" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-96 overflow-hidden rounded-lg">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="storage/images/static/3_contact1.JPG" class="absolute w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="storage/images/static/3_contact2.JPG" class="absolute w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="storage/images/static/3_contact3.JPG" class="absolute w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="storage/images/static/3_contact4.JPG" class="absolute w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    </div>
                </div>

            </div>

            <div class="container mx-auto">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4">
                        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300">
                            <div class="flex-auto p-5 lg:p-10">
                                <h4 class="text-2xl font-semibold">Contacteer ons!</h4>
                                <p class="leading-relaxed mt-1 mb-4 text-gray-600">
                                    Heeft u nog een vraag voor ons? U kan ons telefonisch bereiken op het nummer <a href="tel:015/23.32.37">015/23.32.37</a>, via <a href="mailto:decuyper-gilbert@hotmail.com">e-mail</a> of via het invulformulier op deze website. Uw vraag wordt zo snel mogelijk behandeld.
                                </p>
                                <div class="relative w-full mb-3 mt-8">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="full-name">Volledige naam</label><input id="full-name" type="text" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Volledige naam"  />
                                </div>
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="email">Email</label><input id="email" type="email" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Email" autocomplete="email"  />
                                </div>
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="message">Bericht</label><textarea id="message" rows="4" cols="80" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Stel hier uw vraag..."></textarea>
                                </div>
                                <div class="text-center mt-6">
                                    <button class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg hover:bg-gray-700 focus:bg-gray-700 outline-none focus:outline-none mr-1 mb-1" type="button" >
                                        Verzend bericht
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-default-layout>