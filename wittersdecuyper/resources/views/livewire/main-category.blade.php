<div>
    <div class="relative w-full">
        <!-- Carousel wrapper -->
        <div class="w-full bg-center bg-cover" style="height:32rem; background-image: url('storage/images/static/12699097_Group happy farmers keeping cow and poultry.jpg');">
            <div class="flex items-center justify-center w-full h-full bg-gray-900 bg-opacity-50">
                <div class="mt-16 text-center">
                    <h1 class="text-3xl font-bold text-white uppercase md:text-3xl">Categorieën</h1>
                    <blockquote class="my-4 font-semibold text-center text-white">
                        Op deze pagina vind je een breed scala aan producten voor jouw tuin en dieren. <br>
                        Of je nu op zoek bent naar gereedschap om je tuin te onderhouden, of naar leuke speeltjes voor je hond of kat, je vindt het hier gegarandeerd!
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <div class="container p-2 mx-auto my-4">
        @if ($category)
        <!-- if there are only two categories: -->
        @if ($category->count() == 2)
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2">
            @else
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @endif
                <!-- if more than three categories:  -->
                @foreach ($category as $categorie)
                <a href="{{ route('Categorie', ['slug' => $categorie->name]) }}" class="transform transition-transform duration-300 hover:scale-95 hover:shadow-lg relative grid h-[20rem] w-full flex-col items-end justify-center overflow-hidden rounded-xl bg-white bg-clip-border text-center text-gray-700">
                    <div class="absolute inset-0 w-full h-full m-0 overflow-hidden text-gray-700 bg-transparent bg-center bg-cover rounded-none shadow-none bg-clip-border" style="background-image: url('{{ $categorie->cover['url'] }}');">
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
        <!-- If the type doesn't exist yet -->
        @else
        <h1 class="text-3xl text-center">Deze categorie is er nog niet.</h1>
        @endif
    </div>